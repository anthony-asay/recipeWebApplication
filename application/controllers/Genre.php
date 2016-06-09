 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Genre extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('genre_model');
    }


    public function index()
    {
        $layout_data['header'] = $this->load->view('shared/header', '', TRUE);
        $layout_data['footer'] = $this->load->view('shared/footer', '', TRUE);
        $layout_data['content'] = $this->load->view('shared/listado', $listado_data, TRUE);
        $this->load->view('shared/layout', $layout_data);
    }

    public function list_posts()
    {
        $data['posts'] = $this->post_model->get_posts();
        $data['title'] = 'Welcome to Honey Cards';

        $this->load->view('templates/header', $data);
        $this->load->view('post/list_posts', $data);
        $this->load->view('templates/footer');
    } 

    public function change_state()
    {
        $post_id = (int)$this->input->post('id');
        $state = $this->post_model->get_post($post_id);
        $state = $state['state_id'];
        if($state == 0)
            $state = 1;
        else
            $state = 0;

        $this->post_model->change($post_id, $state);

        $this->output->set_output(json_encode(array('state'=> $state)));
    }

    // SERVICIOS
    
    public function generate_post()
    {
        // genero un nombre aleatorio para la imagen
        $image_name = uniqid();

        // armo la imagen
        $data = $this->input->post('imageData');
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents('./public/uploads/'.$image_name.'.png', $data);

        $data_post = array(
            'user' => 'application',
            'icon' => $this->input->post('icon'),
            'bg_color' => $this->input->post('bg_color'),
            'frame' => $this->input->post('frame'),
            'image' => $image_name.'.png',
            'state_id' => 0,
            'from' => $this->input->post('from'),
            'to' => $this->input->post('to'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'font_description' => $this->input->post('font_description'),
            'color_description' => $this->input->post('color_description'),
            'color_title' => $this->input->post('color_title'),
            'font_title' => $this->input->post('font_title'),
            'date_created' => date('Y-m-d')
        );

        $result = $this->db->insert('post', $data_post);

        $this->output->set_output(json_encode(
            array(
                'id'=> $this->db->insert_id(), 
                'from' => $this->input->post('from'),
                'to' => $this->input->post('to'),
                'image' => $image_name.'.png')
            )
        );
    }

    public function get_highlight($page = 0)
    {
        $per_page = 27; 
        $page = ($page == 0 ? 1 : $page);  
        $start = ($page - 1) * $per_page;  
        
        $posts = $this->post_model->get_highlight_posts($per_page,$start);

        $this->load->view('post/highlight', array('posts' => $posts));
    }


}