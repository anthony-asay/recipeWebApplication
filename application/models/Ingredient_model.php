<?php 
class Ingredient_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_Ingredients()
        {
            $query = $this->db->get('ingredient');
            return $query->result();
        }


        public function Get_Ingredients_by_type($typeId)
        {
            $this->db->select('i.*');
            $this->db->from('ingredient i');
            $this->db->where('i.id_type',$typeId);
            $this->db->order_by('name','desc');
            return $this->db->get()->result();
        }

        public function Get_Types()
        {
            $query = $this->db->get('type_ingredient');
            return $query->result();
        }

        // public function Get_($name = "", $mediumId = "")
        // {
        //     if($mediumId != "")
        //     {
        //         if($nameId != "")
        //         {
        //             $this->db->select('a.*, m.type_medium as medium');
        //             $this->db->from('author a');
        //             $this->db->join('medium m','m.id = a.id_medium', 'left');
        //             $this->db->where('a.id_medium', $mediumId);
        //             $this->db->like('a.name_first', $name);
        //             $this->db->or_like('a.name_last', $name);
        //             $this->db->group_by("a.id"); 
        //             $this->db->order_by('name_first','asc');
        //             return $this->db->get()->result();
        //         }
        //         else
        //         {
        //             $this->db->select('a.*, m.type_medium as medium');
        //             $this->db->from('author a');
        //             $this->db->join('medium m','m.id = a.id_medium', 'left');
        //             $this->db->where('a.id_medium', $mediumId);
        //             $this->db->group_by("a.id"); 
        //             $this->db->order_by('name_first','asc');
        //             return $this->db->get()->result();
        //         }
        //     }
        //     else
        //     {
        //         if($nameId != "")
        //         {
        //             $this->db->select('a.*, m.type_medium as medium');
        //             $this->db->from('author a');
        //             $this->db->join('medium m','m.id = a.id_medium', 'left');
        //             $this->db->like('a.name_first', $name);
        //             $this->db->or_like('a.name_last', $name);
        //             $this->db->group_by("a.id"); 
        //             $this->db->order_by('name_first','asc');
        //             return $this->db->get()->result();
        //         }
        //         else
        //         {
        //             $this->db->select('a.*, m.type_medium as medium');
        //             $this->db->from('author a');
        //             $this->db->join('medium m','m.id = a.id_medium', 'left');
        //             $this->db->group_by("a.id"); 
        //             $this->db->order_by('name_first','asc');
        //             return $this->db->get()->result();
        //         }
        //     }
        // }


		public function Set_Ingredient($ingData)
        {

            $data = array(
                'id_type' => $ingData->id_type,
                'name' => $ingData->name
                );
            $this->db->insert('ingredient', $data);
            return true;
        }

        public function delete_ingredient($ingId)
        {
            $this->db->delete('ingredient', array('id' => $ingId)); 
        }
}