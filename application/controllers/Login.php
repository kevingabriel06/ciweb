<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->helper('url');
        $this->load->model('login_model');

        // Redirect to private area if already logged in
        if ($this->session->userdata('id')) {
            redirect('private_area');
        }
    }

    public function index() {
        // Load the login view
        $this->load->view('auth/login');
    }

    public function validation() {
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password'));
            if ($result === TRUE) {
                // Set session data
                $session_data = array(
                    'id' => $this->login_model->get_user_id($this->input->post('user_email')), // Assuming your model has this method
                    'email' => $this->input->post('user_email')
                );
                $this->session->set_userdata($session_data);

                redirect('project');
            } else {
                $this->session->set_flashdata('message', $result);
                redirect('login');
            }
        } else {
            $this->index();
        }
    }

}
?>
