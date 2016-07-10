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
	        $this->load->view('headerR', $data);
            $this->load->view('sidebar');
            $this->load->view('home');
            $this->load->view('footer');
        }

        public function getRecipesByType($type)
        {
            $data['recipes'] = $this->recipe_model->Get_Recipes_by_type($type);
            $this->load->view('displayResult', $data);
        }
 

        public function addIngredient()
        {
            $ingredient = json_decode($this->input->post('ingredient'));

            if($this->ingredient_model->Set_Ingredient($ingredient))
            {
                echo $ingredient->name;
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

        public function loadIngredientForm()
        {
             $data['types'] = $this->ingredient_model->Get_Types();
             $this->load->view('addIngredientView', $data);
        }

        public function loadHome()
        {
            $this->load->view('home');
        }

        public function VerifyIngredient()
        {
            $ingredient = json_decode($this->input->post('ingredient'));
            if(!$this->recipe_model->verifyIngredient($ingredient))
            {
                echo "noExists";
            }
            else
            {
                echo "exists";
            }
        }

        public function getIngredients()
        {
            $type = $this->input->post('type');
            $arrayIng = $this->ingredient_model->Get_Ingredients_by_type($type);

            if(count($arrayIng) > 0)
            {
                echo json_encode($arrayIng);
            }

        }

        public function loadRecipeForm()
        {
            $data['recipeTypes'] = $this->recipe_model->Get_Types();
            $data['types'] = $this->ingredient_model->Get_Types();
            $data['measurements'] = $this->measurements_model->Get_Measurements();
            $this->load->view('addRecipeView', $data);
        }

        public function addIngredientInput()
        {
            $data['recipeTypes'] = $this->recipe_model->Get_Types();
            $data['types'] = $this->ingredient_model->Get_Types();
            $data['measurements'] = $this->measurements_model->Get_Measurements();
            $data['T'] = $this->rand_color();
            $data['I'] = $this->rand_color();
            $this->load->view('ingredientInput', $data);
        }

        public function addIngForm()
        {
            $data['types'] = $this->ingredient_model->Get_Types();
            $this->load->view('ingForm', $data);
        }

        public function rand_color() 
        {
            return str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        public function loadRecipeSearch()
        {
            $this->load->view('searchForm');
        }
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