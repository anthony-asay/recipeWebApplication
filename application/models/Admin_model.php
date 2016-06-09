<?php 
class Admin_model extends CI_Model {
	
		public function __construct()
		{	
			$this->load->database();	
		}

        public function authenticate($email,$password)
        {
            $this->db->select('*');
            $this->db->from('admin a');
            $this->db->where('a.email = "'.$email.'"');
            $this->db->where('a.password = "'.$password.'"');

            $query = $this->db->get();

            if($query->num_rows() >= 1)
            {
                $list = $query->result();
                $data = array(
                    'id_admin' => $list[0]->adminId,
                    'email' => $list[0]->adminEmail,
                    );
                $this->session->set_userdata($data);
                return true;
            }
            else
            {
                return false;
            }
        }

        public function editAdmin($userId)
        {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
                );

            $this->db->where('id', $userId);
            $this->db->update('admin', $data);
        }

}