<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class SchoolModel extends CI_Model
    {
        public function get_schools()
        {
            $query = $this->db->get('schools');
            return $query->result();
        }
        public function insertSchool($data)
        {
            return $this->db->insert('schools', $data);
        }
        public function findSchool($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('schools');
            return $query->row();
        }
        public function updateSchool($id, $data)
        {
            $this->db->where('id', $id);
            return $this->db->update('schools', $data);
        }
         public function deleteSchool($id)
        {
            return $this->db->delete('schools', ['id' => $id]);
        }
    }
?>
