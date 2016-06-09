<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
	}

	function index()
	{
		$data['title'] = "Admin Login";
		$this->load->view('header', $data);
		$this->load->view('loginAdmin', $data);
		$this->load->view('footer');
	}

	public function procesar()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('password');
		if(!$this->admin->authenticate($email,$password))
		{
			$data['message'] = "The data is incorrect.";
			$data['title'] = "Admin Login";
			$this->load->view('header', $data);
			$this->load->view('loginAdmin', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('admin/index');
		}	
	}

	public function AdminView()
	{
		$data['title'] = "Admin Login";
		$this->load->view('header', $data);
		$this->load->view('loginAdmin', $data);
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */