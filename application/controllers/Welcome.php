<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function newView()
	{
		// $text = 'Campos y chacras';
		// $newCool = explode('_', $text);

		// var_dump($newCool);die;

		// $this->load->view('header');
		// $this->load->view('buscador');
		// $this->load->view('footer-alt');
		// $this->load->view('map');
		$this->load->view('map');
	}

	public function addJson()
	{

		//$myFile = base_url()."public/js/myJSONS.txt";
		
		$myFile = PUBLICPATH."/js/myJSONS.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $this->input->post('array');
		echo($stringData);
		fwrite($fh, $stringData);
		fclose($fh);

	}
}
