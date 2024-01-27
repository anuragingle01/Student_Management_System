<?php
class Login_model extends CI_Model {
    public function get_user($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
?>
