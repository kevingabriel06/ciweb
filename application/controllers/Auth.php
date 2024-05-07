<?php
class Auth extends CI_Controller {

    public function register() {
        // Load necessary libraries and helpers
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, show registration form
            $this->load->view('layout/header');
            $this->load->view('auth/register');
            $this->load->view('layout/footer');
        } else {
            // Form validation passed, proceed with registration
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            // Check if username is already taken
            if ($this->user_model->is_username_available($username)) {
                // Username is available, proceed with registration
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                // Call the register method in user_model with hashed password
                $this->user_model->register($username, $hashed_password);
    
                // Set success message
                $this->session->set_flashdata('success', 'Registration successful!');
    
                // Redirect to login page
                redirect('auth/login');
            } else {
                // Username is not available, show error message
                $this->session->set_flashdata('error', 'Username is already taken. Please choose a different one.');
                redirect('auth/register');
            }
        }
    }
    
    

    public function login() {
        // Load necessary libraries and helpers
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, show login form
            $this->load->view('layout/header');
            $this->load->view('auth/login');
            $this->load->view('layout/footer');
        } else {
            // Form validation passed, login user
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->user_model->login($username, $password);
    
            if ($user) {
                // Login successful, redirect to dashboard or homepage
                $this->session->set_flashdata('success', 'Login successful!');
                redirect('project/index');
            } else {
                // Login failed, show login form with error message
                $this->session->set_flashdata('error', 'Login Unsucessful');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
