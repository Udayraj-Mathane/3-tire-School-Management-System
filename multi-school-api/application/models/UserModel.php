<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserModel extends CI_Model
    {
        public function findUserByEmail($email)
        {
            return $this->db->get_where('users', ['email'=> $email])->row_array();
        }
        public function insertUser($data)
        {
            return $this->db->insert('users', $data);
        }
        public function getUsersByRole($role)
        {
            return $this->db->where('role', $role)->get('users')->result_array();
        }
    }
?>