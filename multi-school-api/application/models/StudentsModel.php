<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class StudentsModel extends CI_Model
    {
        public function get_students()
        {
            $this->db->where('status', 1);
            $query = $this->db->get('students');
            return $query->result();
        }
        public function insertStudents($data)
        {
            return $this->db->insert('students', $data);
        }
        public function findStudents($id)
        {
            $this->db->where('id',$id);
            $query = $this->db->get('students');
            return $query->row();
        }

        public function update_Students($id, $data)
        {
            $this->db->where('id', $id);
            return $this->db->update('students', $data);
        }

        public function delete_Students($id)
        {
            return $this->db->delete('students', ['id' => $id]);
        }

    }
?>