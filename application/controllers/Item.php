<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('item_model');
		$this->load->model('medium_model');
	}

	
	public function index()
	{
		$this->load->view('user_log');
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

}
