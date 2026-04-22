<?php 
    class UserModel extends CI_Model
    {
        public function loginUser($data)
        {
            $this->db->select('*');
            $this->db->where('email', $data['email']);
            $this->db->where('student_id', $data['password']);
            $this->db->from('students');
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 1){
                return $query->row();
            }
            else{
                return false;
            }
        }
        public function registerUser($data)
        {
            return $this->db->insert('users',$data);
        }
        
    }
?>