<?php
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function view() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);

        $this->load->view('view_profile', $data);
    }

    public function edit() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);

        $this->load->view('update_profile', $data);
    }
    public function update_password() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_id');
        $user = $this->user_model->get_user($user_id);
        
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('change_password');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            
            if ($current_password == $user['password']) {
                $data = array(
                    'password' => $new_password
                );
                $this->user_model->update_user($user_id, $data);
                
                $this->session->set_flashdata('success_msg', 'Password updated successfully.');
                redirect('profile/change_password');
            } else {
                $this->session->set_flashdata('error_msg', 'Invalid current password.');
                redirect('profile/change_password');
            }
        }
    }
    
    

    public function update() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->user_model->get_user($user_id);
            $this->load->view('update_profile', $data);
        } else {
            $user_id = $this->session->userdata('user_id');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
    
            $update_data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'gender' => $gender,
                    'phone' => $phone,
                    'address' => $address
                );

    if (!empty($_FILES['profile_image']['name'])) {
        $profile_image_path = $this->do_upload();
        if ($profile_image_path) {
            $update_data['profile_image'] = $profile_image_path;
        }
    }

    $this->user_model->update_user($user_id, $update_data);

    $this->session->set_flashdata('success_msg', 'Profile updated successfully.');
    redirect('profile/view');

        }
    }
    
    

private function do_upload() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = 2048; // Set your desired max file size
    $config['max_width'] = 3000;
    $config['max_height'] = 3000;
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('profile_image')) {
        $error = $this->upload->display_errors();
        $this->form_validation->set_message('do_upload', $error); // Display the upload error as a form validation error
        return false;
    } else {
        $data = array('upload_data' => $this->upload->data());
        return 'uploads/' . $data['upload_data']['file_name']; 
    }
}


    
    
}
?>
