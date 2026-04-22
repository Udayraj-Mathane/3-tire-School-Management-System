<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session', 'api_helper']);
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            return $this->redirect_by_role();
        }

        $this->load->view('admin/layout/header', ['title' => 'Login']);
        $this->load->view('auth/login');
        $this->load->view('admin/layout/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email_id', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Enter Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Login Role', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            return $this->index();
        }

        $credentials = [
            'email'    => $this->input->post('email_id', true),
            'password' => $this->input->post('password'),
            'role'     => $this->input->post('role', true),
        ];

        $result = $this->api_helper->login($credentials);

        if (!$this->api_helper->response_success($result)) {
            $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Invalid Email ID or Password.'));
            redirect('login');
            return;
        }

        $user = $this->api_helper->response_data($result);

        if (!is_array($user)) {
            $this->session->set_flashdata('error', 'Invalid login response from API.');
            redirect('login');
            return;
        }

        $selected_role = strtolower((string) $credentials['role']);
        $api_role = strtolower((string) ($user['role'] ?? ''));

        if ($selected_role !== '' && $api_role !== '' && $selected_role !== $api_role) {
            $this->session->set_flashdata('error', 'Selected role does not match this account.');
            redirect('login');
            return;
        }

        $this->session->set_userdata([
            'user_id'    => $user['id'] ?? null,
            'name'       => $user['name'] ?? ($user['full_name'] ?? ''),
            'email'      => $user['email'] ?? '',
            'role'       => $user['role'] ?? $selected_role,
            'school_id'  => $user['school_id'] ?? '',
            'ref_id'     => $user['ref_id'] ?? ($user['student_ref_id'] ?? null),
            'student_id' => $user['student_id'] ?? '',
            'logged_in'  => true,
        ]);

        $this->session->set_flashdata('success', $this->api_helper->response_message($result, 'Login successful.'));

        return $this->redirect_by_role();
    }

    private function redirect_by_role()
    {
        $role = strtolower((string) $this->session->userdata('role'));

        if ($role === 'superadmin') {
            redirect('superadmin/dashboard');
        } elseif ($role === 'admin') {
            redirect('admin/dashboard');
        } elseif ($role === 'student') {
            redirect('student/dashboard');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'You have been logged out successfully.');
        redirect('login');
    }
}
