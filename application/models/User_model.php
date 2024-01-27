<?php
class User_model extends CI_Model {
    public function get_user($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function get_all_users() {
        $this->db->select('users.*, courses.course_name as course_name');
        $this->db->from('users');
        $this->db->join('courses', 'users.course_id = courses.course_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }
    
    public function add_user($data) {
        $this->db->insert('users', $data);
    }
    public function get_user_courses($user_id) {
        $this->db->select('courses.course_id, course_name');
        $this->db->from('courses');
        $this->db->join('user_courses', 'courses.course_id = user_courses.course_id');
        $this->db->where('user_courses.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_user_courses($user_id, $courses) {
        // Delete existing associations
        $this->db->where('user_id', $user_id);
        $this->db->delete('user_courses');

        // Insert new associations
        foreach ($courses as $course_id) {
            $data = array('user_id' => $user_id, 'course_id' => $course_id);
            $this->db->insert('user_courses', $data);
        }
    }
    public function get_user_profile_image($user_id)
    {
        $this->db->select('profile_image');
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['profile_image'];
        } else {
            return '';
        }
    }
}
?>
