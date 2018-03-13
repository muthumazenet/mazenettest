<?php

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        $data['message'] = "";
        $data['color_code'] = "";
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|is_unique[user.user_name]', array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            ));
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('user_cpassword', 'Confirm Password', 'trim|required|matches[user_password]');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[user.user_email]', array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            ));
            $this->form_validation->set_rules('user_mobile', 'Phone', 'trim|required|numeric|is_unique[user.user_mobile]', array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            ));
            if ($this->form_validation->run()) {


                $user = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_email' => $this->input->post('user_email'),
                    'user_password' => md5($this->input->post('user_password')),
                    'user_age' => $this->input->post('user_age'),
                    'user_mobile' => $this->input->post('user_mobile')
                );
                $this->user_model->store_details($user, 'user');
                $data['message'] = "Record added";
                $data['color_code'] = "#4cae4c";
                $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                header('Refresh:3;url=user/login_view');
            } else {
                $data['message'] = "Validatgion error";
                $data['color_code'] = "#c50000";
                //var_dump(validation_errors());
                //echo 'Form Validation Error';
            }
        }
        $this->load->view("register", $data);
    }

    public function login_view() {
        $data['message'] = "";
        $data['color_code'] = "";
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
            if ($this->form_validation->run()) {
                $user_email = $this->input->post('user_email');
                $user_password = md5($this->input->post('user_password'));
                $user_details = $this->user_model->find_details('user_email', $user_email, 'user');
                if (count($user_details) > 0) {
                    $pass = $user_details[0]['user_password'];
                    $user_id = $user_details[0]['user_id']; 
                    $name = $user_details[0]['user_name'];
                      $email = $user_details[0]['user_email'];
                      $age = $user_details[0]['user_age'];
                      $mobile = $user_details[0]['user_mobile'];
                    if ($user_password === $pass) {
                         $user = array(
                             'user_id' => $user_id,
                    'user_name' => $name,
                    'user_email' =>  $email,
                     'user_age' => $age,
                    'user_mobile' => $mobile
                );
                $this->session->set_userdata($user);
                        $data['message'] = "Login Success";
                        $data['color_code'] = "#4cae4c";
                        $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                        header('Refresh:3;url=user_profile');
                    } else {
                        $data['message'] = "Invalid Password";
                        $data['color_code'] = "#c50000";
                    }
                } else {
                    $data['message'] = "User not Exists";
                    $data['color_code'] = "#c50000";
                }
            } else {
                $data['message'] = "Validatgion error";
                $data['color_code'] = "#c50000";
            }
        }
        $this->load->view("login", $data);
    }

    function user_profile() {

        $this->load->view('user_profile.php');
    }

    public function user_logout() {

        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }

}

?>
