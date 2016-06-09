<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wife extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
        }

        public function index()
        {
            $data['title'] = "Te amo";
	        $this->load->view('headerW', $data);
            $this->load->view('page1');
            $this->load->view('footerW');
        }

        public function loadPage2()
        {
            $this->load->view('page2');
        }

        public function loadPage3()
        {
            $this->load->view('page3');
        }

        public function loadPage4()
        {
            $this->load->view('page4');
        }

        public function loadPage5()
        {
            $this->load->view('page5');
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