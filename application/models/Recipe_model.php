<?php 
class Recipe_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();
		}

        public function Get_Recipe($id)
        {
            $this->db->select('r.*, t.name as type');
            $this->db->from('recipe r');
            $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
            $this->db->where('r.id', $id);
            $this->db->group_by("r.id"); 
            $this->db->order_by('r.id','asc');
            $recipes = $this->db->get()->result();

            foreach($recipes as $recipe)
            {
                $this->db->select('i.name as ingredient, m.name as measure, ri.quantity');
                $this->db->from('recipe_and_ingredients ri');
                $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
                $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
                $this->db->where('ri.id_recipe', $recipe->id);
                $this->db->group_by("i.id");
                $recipe->ingredients = $this->db->get()->result();
            }
            
            return $recipes[0];
        }

        public function Get_Recipes()
        {
            $this->db->select('r.*, t.name as type');
            $this->db->from('recipe r');
            $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
            $this->db->group_by("r.id"); 
            $this->db->order_by('r.id','asc');
            $recipes = $this->db->get()->result();

            foreach($recipes as $recipe)
            {
                $this->db->select('i.name as ingredient, m.name as measure, ri.quantity');
                $this->db->from('recipe_and_ingredients ri');
                $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
                $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
                $this->db->where('ri.id_recipe', $recipe->id);
                $this->db->group_by("i.id");
                $recipe->ingredients = $this->db->get()->result();
            }
            
            return $recipes;
        }

        public function Get_Types()
        {
            $this->db->select('t.*');
            $this->db->from('type_recipe t');
            $this->db->order_by('t.name','asc');
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

        public function Get_Recipes_By_Query($query)
        {
            $arrayRecipes = array();
            if($query->ingredientList[0] != '0')
            {
                foreach($query->ingredientList as $ing)
                {
                    $this->db->select('r.*, t.name as type');
                    $this->db->from('recipe r');
                    $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
                    $this->db->join('recipe_and_ingredients ri','r.id = ri.id_recipe', 'left');
                    if($query->recipe_type != 0)
                    {
                        $this->db->where('r.id_type', $query->recipe_type);
                    }
                    $this->db->where('ri.id_ingredient', $ing->id_ingredient);
                    $this->db->group_by("r.id"); 
                    $this->db->order_by('r.id','asc');
                    $arrayRecipes = $this->db->get()->result();
                }
            }
            else
            {
                $this->db->select('r.*, t.name as type');
                $this->db->from('recipe r');
                $this->db->join('type_recipe t', 't.id = r.id_type', 'left');
                $this->db->join('recipe_and_ingredients ri','r.id = ri.id_recipe', 'left');
                if($query->recipe_type != 0)
                {
                    $this->db->where('r.id_type', $query->recipe_type);
                }
                $this->db->group_by("r.id"); 
                $this->db->order_by('r.id','asc');
                $arrayRecipes = $this->db->get()->result();
            }

            foreach($arrayRecipes as $recipe)
            {
                $this->db->select('i.name as ingredient, m.name as measure, ri.quantity');
                $this->db->from('recipe_and_ingredients ri');
                $this->db->join('ingredient i','i.id = ri.id_ingredient', 'left');
                $this->db->join('measurements m','m.id = ri.id_measurement', 'left');
                $this->db->where('ri.id_recipe', $recipe->id);
                $this->db->group_by("i.id");
                $recipe->ingredients = $this->db->get()->result();
            }
            
            return $arrayRecipes;
        }

		public function Set_Recipe($recipe)
        {

            $data = array(
                'id_type' => $recipe->id_type,
                'rating' => 0,
                'name' => $recipe->name,
                'steps' => $recipe->steps
                );
	           
            $this->db->insert('recipe', $data);

            $id = $this->db->insert_id();
            $send = false;
            
            foreach($recipe->ingredientList as $ing)
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

        public function verifyIngredient($ing)
        {
            $this->db->select('i.*');
            $this->db->from('ingredient i');
            $this->db->where('i.id_type',$ing->id_type);
            $this->db->where('i.name',$ing->name);
            $query = $this->db->get();
            if($query->num_rows() >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function Rate_Recipe($rating)
        {
            $recipe = $this->db->get_where('recipe', array('id' => $rating->recipe), 1)->result()[0];     
            $originalRating = $recipe->rating;
            $sentRating = $rating->rated;
            $recipe->rating = ($originalRating * $recipe->number_rates + $sentRating)/($recipe->number_rates+1);
            $recipe->number_rates += 1;
            $this->db->where('id', $rating->recipe);
            var_dump($recipe->rating);
            $this->db->update('recipe', $recipe);
        }

        public function delete_recipe($recipeId)
        {
            $this->db->delete('recipe', array('id' => $recipeId)); 
            $this->db->delete('recipe_and_ingredients', array('id_recipe' => $recipeId)); 
        }
}