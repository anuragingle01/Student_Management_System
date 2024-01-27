<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
       
    }

    public function index() {
       
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);

        $this->load->view('dashboard', $data);
    }

    public function view_profile() {
        // Check if the user is logged in
       /* if (!$this->session->userdata('user_id')) {
            redirect('login');
        }*/

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);

        $this->load->view('view_profile', $data);
    }

    public function update_profile() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        $user_id = $this->session->userdata('user_id');
    
        $data['user'] = $this->user_model->get_user($user_id);
    
        $this->load->view('update_profile', $data);
    }
    

    public function change_password() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

       
        $this->load->view('change_password');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
?>
