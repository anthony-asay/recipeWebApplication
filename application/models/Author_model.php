<?php 
class Author_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_authors($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                $query = $this->db->get('author');
                return $query->result_array();
            }

            $query = $this->db->get_where('author', array('slug' => $slug));
            return $query->row_array();
        }


        public function Get_author($authorId)
        {
            $query = $this->db->get_where('author', array('id' => $authorId));
            return $query->row_array();

        }

         public function Get_authors_by_medium($mediumId)
        {
            $this->db->select('a.*');
            $this->db->from('author a');
            $this->db->where('a.id_medium',$mediumId);
            $this->db->order_by('name_first','desc');
            return $this->db->get()->result();
        }

        public function Get_authors_by_date($year, $month)
        {
            $this->db->select('i.*, YEAR(i.date_created) as years');
            $this->db->from('author i');
            if($year)
                $this->db->where('YEAR(i.date_created)',$year);
            if($month)
                $this->db->where('MONTH(i.date_created)',$month);
            $this->db->group_by("years"); 
            $this->db->order_by('years','asc');
            return $this->db->get()->result();
        }

        public function Get_authors_by_query($name = "", $mediumId = "")
        {
            if($mediumId != "")
            {
                if($nameId != "")
                {
                    $this->db->select('a.*, m.type_medium as medium');
                    $this->db->from('author a');
                    $this->db->join('medium m','m.id = a.id_medium', 'left');
                    $this->db->where('a.id_medium', $mediumId);
                    $this->db->like('a.name_first', $name);
                    $this->db->or_like('a.name_last', $name);
                    $this->db->group_by("a.id"); 
                    $this->db->order_by('name_first','asc');
                    return $this->db->get()->result();
                }
                else
                {
                    $this->db->select('a.*, m.type_medium as medium');
                    $this->db->from('author a');
                    $this->db->join('medium m','m.id = a.id_medium', 'left');
                    $this->db->where('a.id_medium', $mediumId);
                    $this->db->group_by("a.id"); 
                    $this->db->order_by('name_first','asc');
                    return $this->db->get()->result();
                }
            }
            else
            {
                if($nameId != "")
                {
                    $this->db->select('a.*, m.type_medium as medium');
                    $this->db->from('author a');
                    $this->db->join('medium m','m.id = a.id_medium', 'left');
                    $this->db->like('a.name_first', $name);
                    $this->db->or_like('a.name_last', $name);
                    $this->db->group_by("a.id"); 
                    $this->db->order_by('name_first','asc');
                    return $this->db->get()->result();
                }
                else
                {
                    $this->db->select('a.*, m.type_medium as medium');
                    $this->db->from('author a');
                    $this->db->join('medium m','m.id = a.id_medium', 'left');
                    $this->db->group_by("a.id"); 
                    $this->db->order_by('name_first','asc');
                    return $this->db->get()->result();
                }
            }
        }


		public function Set_author()
        {
            $this->load->helper('url');

            //$slug = url_title($this->input->post('nameFirst').$this->input->post->('nameLast'), 'dash', TRUE);

            $data = array(
                'id_medium' => $this->input->post('mediumId'),
                'name_last' => $this->input->post('nameLast'),
                'name_first' => $this->input->post('nameFirst'),
                'slug' => $slug
                );
        
	
        return $this->db->insert('author', $data);
        }

        public function Edit_author($authorId)
        {
            $data = array(
                'id_medium' => $this->input->post('mediumId'),
                'name_last' => $this->input->post('nameLast'),
                'name_first' => $this->input->post('nameFirst')
                );

        $this->db->where('id', $authorId);
        $this->db->update('author', $data);

        }

        public function delete_author($authorId)
        {
            $this->db->delete('author', array('id' => $authorId)); 
        }
}