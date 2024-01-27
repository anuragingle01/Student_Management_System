<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function authenticate() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->login_model->get_user($email, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error_msg', 'Invalid login credentials.');
                redirect('login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
?>
