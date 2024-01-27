<?php
// Your code here
use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->model('teacher_model');
        $this->load->model('admin_model');
        $this->load->library('pagination');
    }
    public function index() {
        $data = array();

        $config['base_url'] = base_url('index.php/dashboard/index');
        $config['total_rows'] = $this->admin_model->count_students();
        $config['per_page'] = 5; 
        $config['uri_segment'] = 3; 

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get current page number from URL
        $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        // Fetch records for the current page
        $data['users'] = $this->admin_model->get_students($config['per_page'], $page);

        // Search functionality
        $search_keyword = $this->input->get('search');
        if (!empty($search_keyword)) {
            $data['users'] = $this->admin_model->search_students($search_keyword);
        }

        // Pass data to the view
        $data['search_keyword'] = $search_keyword;
        $this->load->view('admin/dashboard', $data);
    }

    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        $this->load->view('admin/login');
    }

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email === 'admin@gmail.com' && $password === 'admin123') {
            $admin_data = array(
                'admin_logged_in' => true
            );
            $this->session->set_userdata($admin_data);

            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error_msg', 'Invalid login credentials.');
            redirect('admin/login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $data['users'] = $this->user_model->get_all_users();

        $this->load->view('admin/dashboard', $data);
        
    }
    public function teachers_dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $data['teachers'] = $this->teacher_model->get_all_teachers();

        $this->load->view('admin/teachers_dashboard', $data);
    }

    public function add_teacher() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Failed to add teacher. Please fill in all the required fields.');
            redirect('admin/teachers_dashboard');
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );

            $this->teacher_model->add_teacher($data);

            $this->session->set_flashdata('success', 'Teacher added successfully.');
            redirect('admin/teachers_dashboard');
        }
    }
    public function add_teacher_page() {
        $this->load->view('admin/add_teacher_page');
    }
    

    public function delete_teacher($teacher_id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->teacher_model->delete_teacher($teacher_id);

        $this->session->set_flashdata('success', 'Teacher deleted successfully.');
        redirect('admin/teachers_dashboard');
    }
    public function edit_teacher($teacher_id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $data['teacher'] = $this->teacher_model->get_teacher($teacher_id);
    
        if (!$data['teacher']) {
            $this->session->set_flashdata('error', 'Teacher not found.');
            redirect('admin/teachers_dashboard');
        }
    
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit_teacher', $data);
        } else {
            $updated_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );
    
            $this->teacher_model->update_teacher($teacher_id, $updated_data);
    
            $this->session->set_flashdata('success', 'Teacher updated successfully.');
            redirect('admin/teachers_dashboard');
        }
    }
    

    public function delete($user_id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $this->user_model->delete_user($user_id);
    
        $this->session->set_flashdata('success', 'User deleted successfully.');
        redirect('admin/dashboard');
    }
    

    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }

    public function add_user() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('courses[]', 'Courses', 'required'); // Add this line
    
        if ($this->form_validation->run() == FALSE) {
            $data['all_courses'] = $this->user_model->get_all_courses(); // Add this line
            $this->load->view('admin/add_student', $data); // Change the view name to 'add_student'
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );
    
            $this->user_model->add_user($data);
            $user_id = $this->db->insert_id();
    
            $courses = $this->input->post('courses');
            $this->user_model->update_user_courses($user_id, $courses);
    
            redirect('admin/dashboard');
        }
    }

    public function edit($user_id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $data['user'] = $this->user_model->get_user($user_id);
        
        if ($data['user']) {
            $this->load->view('admin/edit_user', $data);
        } else {
            redirect('admin/dashboard');
        }
    }

    public function update($user_id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/edit_user');
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );
    
            // Handle profile image upload
            if (!empty($_FILES['profile_image']['name'])) {
                $profile_image_path = $this->do_upload();
                if ($profile_image_path) {
                    $data['profile_image'] = $profile_image_path;
                }
            }
    
            $this->user_model->update_user($user_id, $data);
    
            redirect('admin/dashboard');
        }
    }
    
    
    
    public function add_student() {
        $this->load->view('admin/add_student');
    }

    public function save_student() {
       
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone')
        );
    
        if (!empty($_FILES['profile_image']['name'])) {
            $profile_image_path = $this->do_upload();
            if ($profile_image_path) {
                $data['profile_image'] = $profile_image_path;
            }
        }
    
        $user_id = $this->user_model->add_user($data);
    
        redirect('admin/dashboard');
    }
    
    private function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 3000;
        $config['max_height'] = 3000;
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
            return ''; 
        } else {
            $data = array('upload_data' => $this->upload->data());
            return 'uploads/' . $data['upload_data']['file_name'];
        }
    }
    

    public function import_teachers()
{
    if (!empty($_FILES['teacher_file']['name'])) {
        $file = $_FILES['teacher_file']['tmp_name'];

        require_once FCPATH . 'vendor/autoload.php';

        $excel = IOFactory::load($file);
        $worksheet = $excel->getActiveSheet();

        $teachers = array();

        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $teacherData = array();

            foreach ($cellIterator as $cell) {
                $columnIndex = $cell->getColumn();
                $cellValue = $cell->getValue();

                switch ($columnIndex) {
                    case 'A':
                        $teacherData['first_name'] = $cellValue;
                        break;
                    case 'B':
                        $teacherData['last_name'] = $cellValue;
                        break;
                    case 'C':
                        $teacherData['email'] = $cellValue;
                        break;
                    case 'D':
                        $teacherData['gender'] = $cellValue;
                        break;
                    case 'E':
                        $teacherData['address'] = $cellValue;
                        break;
                    case 'F':
                        $teacherData['phone'] = $cellValue;
                        break;
                    default:
                        break;
                }
            }

            if (empty($teacherData['first_name']) || empty($teacherData['last_name']) || empty($teacherData['email'])) {
                continue;
            }

            $teachers[] = $teacherData;
        }

        var_dump($teachers);

        $this->load->model('Teacher_model');

        foreach ($teachers as $teacher) {
            $this->Teacher_model->add_teacher($teacher);
        }

        redirect('admin/teachers_dashboard');
    } else {
        echo 'No file uploaded.';
    }
}





}
?>
