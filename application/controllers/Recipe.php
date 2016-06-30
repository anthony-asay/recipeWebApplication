<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('recipe_model');
            $this->load->helper('url_helper');
            $this->load->model('ingredient_model');
            $this->load->model('measurements_model');
            // $this->load->library('My_PHPMailer');
        }

        public function index()
        {
            $data['title'] = "Login";
            $data['recipes'] = $this->recipe_model->Get_Recipes();
	        $this->load->view('header', $data);
            $this->load->view('login');
            $this->load->view('footer');
        }

        public function getRecipesByType($type)
        {
            $data['recipes'] = $this->recipe_model->Get_Recipes_by_type($type);
            $this->load->view('displayResult', $data);
        }

        public function 

        public function addIngredient()
        {
            $ingredient = json_decode($this->input->post('ingredient'));

            if($this->ingredient_model->Set_Ingredient($ingredient))
            {
                echo true;
            }
        }

        public function addRecipe()
        {
            $recipe = json_decode($this->input->post('recipe'));

            if($this->recipe_model->Set_Recipe($recipe))
            {
                echo true;
            }
        }

        // public function VerifyEmail()
        // {
        //     $email = $this->input->post('email');
        //     if(!$this->user_model->verifyEmail($email))
        //     {
        //         echo "noExists";
        //     }
        //     else
        //     {
        //         echo "exists";
        //     }
        // }

        // public function AddNewUser()
        // {
        //     $user = json_decode($this->input->post('user'));

        //     $user->password = md5($user->password);
        //     if(!$this->user_model->set_user($user))
        //     {
                
        //     }
        //     else
        //     {
        //         $_SESSION['userId'] = $this->db->insert_id();
        //         $userInfo = $this->user_model->get_user($_SESSION['userId']);
        //         echo json_encode($userInfo);
        //     }
        // }
}