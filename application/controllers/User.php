<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('url_helper');
            $this->load->model('item_model');
        }

        public function index()
        {
            // if(isset($_SESSION['userId']))
            // {
            //     $data['title'] = "DOM";
            //     $data['items'] = $this->item_model->Get_items();
            //     $this->load->view('header', $data);
            //     $this->load->view('dom', $data);
            // }
            $data['title'] = "Login";
	        $this->load->view('header', $data);
            $this->load->view('login');
            $this->load->view('footer');
        }

        public function authenticate()
        {
            $user = json_decode($this->input->post('user'));
            $email = $user->email;
            $password = $user->password;
            if(!$this->user_model->authenticate($email,$password))
            {
                /*$data['title'] = "Login";
                $data['message'] = "The data is incorrect.";
                $this->load->view('header', $data);
                $this->load->view('login', $data);*/
            }
            else
            {
                $data['title'] = "DOM";
                $data['items'] = $this->item_model->Get_items();
                $this->load->view('dom', $data);
            }   
        }

        public function loadUserLog()
        {
            $data['items'] = $this->item_model->Get_items();
            $this->load->view('dom', $data);
        }

        public function loadRegister()
        {
            $this->load->view('userForm');
        }

        public function loadLogin()
        {
            $this->load->view('login');
        }

        public function register()
        {
            $data['title'] = "Register";
            $this->load->view('header', $data);
            $this->load->view('userForm');
        }

        public function EditUser($userId = 1)
        {
            $data['user'] = $this->user_model->get_user($userId);
            var_dump($data);die;
        }

        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            redirect('user');
        }

        public function VerifyEmail()
        {
            $email = $this->input->post('email');
            if(!$this->user_model->verifyEmail($email))
            {
                echo "noExists";
            }
            else
            {
                echo "exists";
            }
        }

        public function AddNewUser()
        {
            $user = json_decode($this->input->post('user'));
            $user->password = md5($user->password);
            if(!$this->user_model->set_user($user))
            {
                echo "There was an error.";
            }
            else
            {
                $_SESSION['userId'] = $this->db->insert_id();
                echo "You were registered!";
            }
        }
}