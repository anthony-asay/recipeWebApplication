<?php 

class Measurements_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function get_user_log($userId)
        {
            $this->db->select('q.*, m.type_medium as medium, CONCAT(a.name_first, '.', name_last) AS author, i.name_item as title');
            $this->db->from('quick_rating q');
            $this->db->join('item i','i.id = q.id_item', 'left');
            $this->db->join('medium m','m.id = i.id_medium', 'left');
            $this->db->join('author a','a.id = i.id_author', 'left');
            $this->db->where('q.id_user',$userId);
            $this->db->group_by("q.id"); 
            $this->db->order_by('q.date_finished','asc');
            return $this->db->get()->result();
        }


        public function get_log($itemId)
        {
            $query = $this->db->get_where('item', array('id' => $itemId));
            return $query->row_array();

        }

        public function get_log_by_medium($mediumId)
        {
            $this->db->select('q.*, m.type_medium as medium, CONCAT(a.name_first, '.', name_last) AS author, i.name_item as title');
            $this->db->from('q. quick_rating');
            $this->db->join('item i','i.id = q.id_item', 'left');
            $this->db->join('medium m','m.id = i.id_medium', 'left');
            $this->db->join('author a','a.id = i.id_author', 'left');
            $this->db->where('i.id_medium',$mediumId);
            $this->db->group_by("q.id"); 
            $this->db->order_by('q.date_finished','asc');
            return $this->db->get()->result();

        }

        public function get_log_by_date($year, $month, $userId)
        {
            $this->db->select('q.*, m.type_medium as medium, CONCAT(a.name_first, '.', name_last) AS author, i.name_item as title');
            $this->db->from('q. quick_rating');
            $this->db->join('item i','i.id = q.id_item', 'left');
            $this->db->join('medium m','m.id = i.id_medium', 'left');
            $this->db->join('author a','a.id = i.id_author', 'left');
            $this->db->where('q.id_user',$userId);
            if($year)
                $this->db->where('YEAR(q.date_finished)',$year);
            if($month)
                $this->db->where('MONTH(q.date_finished)',$month);
            $this->db->group_by("q.id"); 
            $this->db->order_by('q.date_finished','asc');
            return $this->db->get()->result();
        }


		public function set_log()
        {
            $data = array(
                'id_user' => $this->input->post('userId'),
                'id_item' => $this->input->post('itemId'),
                'rating' => $this->input->post('rating'),
                'date_finished' => $this->input->post('date')
                );
	
            return $this->db->insert('quick_rating', $data);
        }

        public function edit_log($logId)
        {
            $data = array(
                'id_user' => $this->input->post('userId'),
                'id_item' => $this->input->post('itemId'),
                'rating' => $this->input->post('rating'),
                'date_finished' => $this->input->post('date')
                );

            $this->db->where('id', $logId);
            $this->db->update('quidk_rating', $data);

        }

        public function delete_log($logId)
        {
            $this->db->delete('item', array('id' => $itemId)); 
        }
}