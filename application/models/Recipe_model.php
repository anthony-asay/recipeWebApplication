<?php 
class Recipe_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_Recipes()
        {
            $this->db->select('r.*, i.name as ingredient, m.name as measure, ri.quantity , t.name as type');
            $this->db->from('recipe r');
            $this->db->join('recipe_and_ingredients ri','r.id = ri.id_recipe', 'left');
            $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
            $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
            $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
            $this->db->group_by("r.id"); 
            $this->db->order_by('r.id','desc');
            return $this->db->get()->result();
        }


        public function Get_Recipes_by_type($typeId)
        {
            $this->db->select('r.*, i.name as ingredient, m.name as measure, ri.quantity, t.name as type');
            $this->db->from('recipe r');
            $this->db->join('recipe_and_ingredients ri','r.id = ri.id_recipe', 'left');
            $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
            $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
            $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
            $this->db->where('r.id_type', $typeId);
            $this->db->group_by("r.id"); 
            $this->db->order_by('r.id','desc');
            return $this->db->get()->result();
        }

        public function Get_Recipes_by_Ingredients($ingList)
        {
            $this->db->select('r.*, i.name as ingredient, m.name as measure, ri.quantity, t.name as type');
            $this->db->from('recipe r');
            $this->db->join('recipe_and_ingredients ri','r.id = ri.id_recipe', 'left');
            $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
            $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
            $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
            $this->db->where_in('i.id',$ingList);
            $this->db->group_by("r.id"); 
            $this->db->order_by('r.id','desc');
            return $this->db->get()->result();

        }

		public function Set_Recipe($recipe)
        {

            $data = array(
                'id_type' => $recipe->id_type,
                'rating' => $recipe->rating,
                'name' => $recipe->name,
                'steps' => $recipe->steps
                );
	           
            $this->db->insert('recipe', $data);

            $id = $this->db->insert_id();
            $send = false;
            foreach($recipe['ingredients'] as $ing)
            {
                $new = array(
                    'id_recipe' => $id,
                    'id_ingredient' => $ing->id_ingredient,
                    'id_measurement' => $ing->id_measurement,
                    'quantity' => $ing->quantity
                    );

                $this->db->insert('recipe_and_ingredients', $new);

                $send = true;
            }

            return $send;
        }

        public function Rate_Recipe($rating)
        {
            $recipe = $this->db->get_where('recipe', array('id' => $rating->id));
            $originalRating = $recipe->rating;
            $sentRating = $rating->rating;
            $recipe->rating = ($originalRating + $sentRating)/2;
            $this->db->where('id', $rating->id);
            $this->db->update('reciipe', $recipe);
        }

        public function delete_recipe($recipeId)
        {
            $this->db->delete('recipe', array('id' => $recipeId)); 
            $this->db->delete('recipe_and_ingredients', array('id_recipe' => $recipeId)); 
        }
}