<?php 
class Item_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_items($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                $this->db->select('i.*, m.type_medium as medium, CONCAT(a.name_first, '.', name_last) AS author');
                $this->db->from('item i');
                $this->db->join('medium m','m.id = i.id_medium', 'left');
                $this->db->join('author a','a.id = i.id_author', 'left');
                $this->db->group_by("i.id"); 
                $this->db->order_by('i.name_item','asc');
                return $this->db->get()->result();
            }

            $query = $this->db->get_where('item', array('slug' => $slug));
            return $query->row_array();
        }


        public function Get_item($itemId)
        {
            $query = $this->db->get_where('item', array('id' => $itemId));
            return $query->row_array();

        }

         public function Get_items_by_medium($mediumId)
        {

            $query = $this->db->get_where('post', array('id_medium' => $userId));
            return $query->row_array();

        }

        public function Get_items_by_date($year, $month)
        {
            $this->db->select('i.*, YEAR(i.date_created) as years');
            $this->db->from('item i');
            if($year)
                $this->db->where('YEAR(i.date_created)',$year);
            if($month)
                $this->db->where('MONTH(i.date_created)',$month);
            $this->db->group_by("years"); 
            $this->db->order_by('years','desc');
            return $this->db->get()->result();
        }


		public function Set_item()
        {
            $this->load->helper('url');
            $slug = url_title($this->input->post('name'), 'dash', TRUE);

            $data = array(
                'id_medium' => $this->input->post('mediumId'),
                'id_author' => $this->input->post('authorId') ?: NULL,
                'date_released' => $this->input->post('dateReleased'),
                'name_item' => $this->input->post('name'),
                'synopsis' => $this->input->post('synopsis'),
                'rating' => $this->input->post('title'),
                'slug' => $slug
                );
	
        return $this->db->insert('item', $data);
        }

        public function Edit_item($itemId)
        {
            $data = array(
                'id_medium' => $this->input->post('mediumId'),
                'id_author' => $this->input->post('authorId'),
                'date_released' => $this->input->post('dateReleased'),
                'name_item' => $this->input->post('name'),
                'synopsis' => $this->input->post('synopsis'),
                'rating' => $this->input->post('title')
                );

        $this->db->where('id', $itemId);
        $this->db->update('item', $data);

        }

        public function Rate_Item()
        {
            $data = $this->input->post('data');
            $item = Get_item($data->id);
            $originalRating = $item->rating;
            $sentRating = $data->rating;
            $numberOfRates = $item->numberOfRates ?: 0;
            $numberOfRates += 1;
            $item->numberOfRates = $numberOfRates;
            $item->rating = ($originalRating + $sentRating)/$numberOfRates;
            $this->db->where('id', $data->id);
            $this->db->update('item', $item);
        }

        public function delete_post($itemId)
        {
            $this->db->delete('item', array('id' => $itemId)); 
        }
}