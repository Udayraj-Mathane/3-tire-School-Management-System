<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(['form_validation', 'session', 'api_helper']);
    }

    public function index()
    {
        $this->load->view('admin/layout/header', ['title' => 'Register']);
        $this->load->view('auth/register');
        $this->load->view('admin/layout/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('school_id', 'School ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            return $this->index();
        }

        $data = [
            'name'      => trim($this->input->post('first_name', true) . ' ' . $this->input->post('last_name', true)),
            'email'     => $this->input->post('email', true),
            'password'  => $this->input->post('password'),
            'role'      => $this->input->post('role', true),
            'school_id' => $this->input->post('school_id', true),
            'ref_id'    => 0,
        ];

        $result = $this->api_helper->register($data);

        if ($this->api_helper->response_success($result)) {
            $this->session->set_flashdata('success', $this->api_helper->response_message($result, 'Registered successfully. Go to login.'));
            redirect('login');
            return;
        }

        $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Registration failed.'));
        redirect('register');
    }
}
