<?php 

class Measurements_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_Measurements()
        {
            $query = $this->db->get('measurements');
            return $query->result();
        }
}