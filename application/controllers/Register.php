<?php
class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('register_model');
    }

    public function index() {
        // Fetch courses from the model
        $data['courses'] = $this->register_model->get_courses();

        $this->load->view('register', $data);
    }

    public function save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[200]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('course_id', 'Course', 'required'); // Added course validation

        if ($this->form_validation->run() == FALSE) {
            // Fetch courses from the model
            $data['courses'] = $this->register_model->get_courses();

            $this->load->view('register', $data);
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'password' => $this->input->post('password'),
                'profile_image' => $this->do_upload(),
                'course_id' => $this->input->post('course_id'), // Added course_id
            );

            $this->register_model->save($data);
            $this->session->set_flashdata('success_msg', 'User registered successfully.');
            redirect('login'); 
        }
    }

    private function do_upload() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = 2048;
    $config['max_width'] = 3000;
    $config['max_height'] = 3000; 

    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $error = array('error' => $this->upload->display_errors());
        echo $error['error'];
        return ''; 
    } else {
        $data = array('upload_data' => $this->upload->data());
        return $config['upload_path'] . $data['upload_data']['file_name']; 
    }
}

}
?>

