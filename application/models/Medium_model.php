<?php 
class Medium_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_mediums()
        {
            $query = $this->db->get('medium');
            return $query->row_array();
        }


        public function Get_medium($mediumId)
        {
            $query = $this->db->get_where('medium', array('id_medium' => $itemId));
            return $query->row_array();

        }
}