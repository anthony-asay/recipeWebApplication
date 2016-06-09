<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('item_model');
	}

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function newView()
	{
		$data['title'] = "JSON";
		$data['items'] = $this->item_model->Get_items();
		// $this->load->view('header');
		// $this->load->view('buscador');
		// $this->load->view('footer-alt');
		// $this->load->view('map');
		$this->load->view('header', $data);
		$this->load->view('map', $data);
	}

	public function addJson()
	{

		//$myFile = base_url()."public/js/myJSONS.txt";
		
		$myFile = PUBLICPATH."/js/myJSONs.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $this->input->post('array');
		//echo($myFile);
		//echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		echo($stringData);
		fwrite($fh, $stringData);
		fclose($fh);

	}

	public function addItemJson()
	{
		$myFile = PUBLICPATH."/js/items.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $this->input->post('array');
		echo($stringData);
		fwrite($fh, $stringData);
		fclose($fh);
	}

	// public function addJSON()
	// {
	// 	$myFile = PUBLICPATH."/js/items.txt";
	// 	$fh = fopen($myFile, 'w') or die("can't open file");
	// 	$stringData = $this->input->post('array');
	// 	//echo($myFile);
	// 	//echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	// 	echo($stringData);
	// 	fwrite($fh, $stringData);
	// 	fclose($fh);
	// }

	public function dom()
	{
		$data['title'] = "DOM";
		$data['items'] = $this->item_model->Get_items();
		$this->load->view('header', $data);
		$this->load->view('dom', $data);
	}

	public function CSSAnimation()
	{
		$data['title'] = "CSS Animation";
		$data['items'] = $this->item_model->Get_items();
		$this->load->view('header', $data);
		$this->load->view('CSSAnimations', $data);
	}
}
