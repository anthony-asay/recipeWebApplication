<?php 
class User_model extends CI_Model {
	
		public function __construct()
		{
			$this->load->database();		
		}

        public function authenticate($email,$password)
        {
            $query = $this->db->get_where('user', array('email' => $email, 'password' => md5($password)));
            if($query->num_rows() >= 1)
            {
                $list = $query->result();
                $_SESSION['userId'] = $list[0]->id;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function get_user($userId)
        {
            $query = $this->db->get_where('user', array('id' => $userId));
            return $query->row_array();
        }

        public function verifyEmail($email)
        {
            $query = $this->db->get_where('user', array('email' => $email));
            if($query->num_rows() >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        // public function get_user_by_twitter($twitterId)
        // {

        //     $query = $this->db->get_where('user', array('tw_id' => $twitterId));
        //     return $query->row_array();

        // }

        // public function get_user_by_face($faceId)
        // {
        //     $query = $this->db->get_where('user', array('fb_id' => $faceId));
        //     return $query->row_array();
        // }

		public function set_user($data = "")
        {
            $this->load->helper('url');
            if($data == "")
            {
                $data = array(
                    'name_user' => $this->input->post('name'),
                    'date_birth' => $this->input->post('birthDate'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password'))
                    );
            }
            if($data != "")
            {
                return $this->db->insert('user', $data);
            }
            else
            {
                return false;
            }
        }

        public function edit_user($userId)
        {
            $data = array(
                'name_user' => $this->input->post('name'),
                'date_birth' => $this->input->post('birthDate'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
                );

            $this->db->where('id', $userId);
            $this->db->update('user', $data);
        }

        public function borrar_user($userId)
        {
            $this->db->delete('review', array('id' => $userId)); 
            $this->db->delete('user', array('id' => $userId)); 
        }
}