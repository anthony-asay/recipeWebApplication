<?php 

class Measurements_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_Measurements()
        {
        	$this->db->select('m.*');
            $this->db->from('measurements m');
            $this->db->order_by('m.name','asc');
            return $this->db->get()->result();
        }
}