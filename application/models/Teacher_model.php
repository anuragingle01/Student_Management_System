<?php
class Teacher_model extends CI_Model {
    public function get_all_teachers() {
        $query = $this->db->get('teachers');
        return $query->result_array();
    }

    public function get_teacher($teacher_id) {
        $this->db->where('id', $teacher_id);
        $query = $this->db->get('teachers');
        return $query->row_array();
    }

    public function add_teacher($data) {
        $this->db->insert('teachers', $data);
        return $this->db->insert_id();
    }
    public function update_teacher($teacher_id, $teacher_data)
{
    $this->db->where('id', $teacher_id);
    $this->db->update('teachers', $teacher_data);
}


    public function delete_teacher($teacher_id) {
        $this->db->where('id', $teacher_id);
        $this->db->delete('teachers');
    }
    public function importTeachers($teachers)
{
    foreach ($teachers as $teacher) {
        $teacher_data = array(
            'first_name' => $teacher['first_name'],
            'last_name' => $teacher['last_name'],
            'email' => $teacher['email'],
            'phone' => $teacher['phone'],
            'gender' => $teacher['gender'],
            'address' => $teacher['address']
        );

        $this->db->where('id', $teacher['id']);
        $this->db->set($teacher_data);
        $this->db->update('teachers');
    }
}


}