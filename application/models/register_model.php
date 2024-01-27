<?php
class Register_model extends CI_Model {
    public function save($data) {
        $this->db->insert('users', $data);
    }
    public function get_courses() {
        return $this->db->get('courses')->result_array();
    }
}
?>
