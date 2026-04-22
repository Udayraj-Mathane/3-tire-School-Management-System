<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(['session', 'api_helper']);
        $this->load->helper(['url']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        if ($this->session->userdata('role') !== 'superadmin') {
            redirect('admin/dashboard');
        }
    }

    private function load_view($view, $data = []) {
        $this->load->view('admin/layout/header', $data);
        $this->load->view("superadmin/$view", $data);
        $this->load->view('admin/layout/footer');
    }

    public function index() {
        $schools_result = $this->api_helper->get_schools();
        $students_result = $this->api_helper->get_all_students();
        $admins_result = $this->api_helper->get_admins();

        $schools = $this->api_helper->response_success($schools_result)
            ? $this->api_helper->response_data($schools_result)
            : [];
        $students = $this->api_helper->response_success($students_result)
            ? $this->api_helper->response_data($students_result)
            : [];
        $admins = $this->api_helper->response_success($admins_result)
            ? $this->api_helper->response_data($admins_result)
            : [];

        $data = [
            'title'          => 'Super Admin Dashboard',
            'total_schools'  => is_array($schools) ? count($schools) : 0,
            'total_admins'   => is_array($admins) ? count($admins) : 0,
            'total_students' => is_array($students) ? count($students) : 0,
        ];

        $this->load_view('dashboard', $data);
    }
}
