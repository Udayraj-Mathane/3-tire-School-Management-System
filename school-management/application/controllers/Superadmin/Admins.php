<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(['session', 'api_helper']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        if ($this->session->userdata('role') !== 'superadmin') {
            redirect('admin/dashboard');
        }
    }

    private function load_view($view, $data = []) {
        $this->load->view('admin/layout/header', $data);
        $this->load->view("superadmin/admins/$view", $data);
        $this->load->view('admin/layout/footer');
    }

    public function index() {
        $admins_result = $this->api_helper->get_admins();

        $data = [
            'title'  => 'School Admins',
            'admins' => $this->api_helper->response_success($admins_result)
                ? $this->api_helper->response_data($admins_result)
                : []
        ];

        $this->load_view('index', $data);
    }

    public function create() {
        $schools_result = $this->api_helper->get_schools();

        $this->load_view('create', [
            'title'   => 'Create Admin',
            'schools' => $this->api_helper->response_success($schools_result)
                ? $this->api_helper->response_data($schools_result)
                : []
        ]);
    }

    public function store() {
        if ($this->input->method() !== 'post') {
            return redirect('superadmin/admins/create');
        }

        $data = [
            'school_id' => $this->input->post('school_id', true),
            'email'     => $this->input->post('email', true),
            'password'  => $this->input->post('password'),
            'role'      => 'admin'
        ];

        $result = $this->api_helper->create_admin($data);

        if ($this->api_helper->response_success($result)) {
            $this->session->set_flashdata('success', $this->api_helper->response_message($result, 'Admin created successfully!'));
            redirect('superadmin/admins');
            return;
        }

        $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Failed to create admin.'));
        redirect('superadmin/admins/create');
    }

    public function delete($id) {
        $this->session->set_flashdata('success', 'Admin deleted (dummy).');
        redirect('superadmin/admins');
    }
}
