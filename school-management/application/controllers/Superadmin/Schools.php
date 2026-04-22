<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['api_helper', 'session']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'superadmin') {
            redirect('login');
        }
    }

    private function load_view($view, $data = []) {
        $this->load->view('admin/layout/header', $data);
        $this->load->view("superadmin/schools/$view", $data);
        $this->load->view('admin/layout/footer');
    }

    public function index() {
        $result = $this->api_helper->get_schools();

        $data = [
            'title'   => 'All Schools',
            'schools' => [],
            'error'   => null
        ];

        if ($this->api_helper->response_success($result)) {
            $data['schools'] = $this->api_helper->response_data($result);
        } else {
            $data['error'] = $this->api_helper->response_message($result, 'Failed to fetch schools');
        }

        $this->load_view('index', $data);
    }

    public function create() {
        $this->load_view('create', ['title' => 'Create School']);
    }

    public function store() {
        if ($this->input->method() !== 'post') {
            return redirect('superadmin/schools/create');
        }

        $data = [
            'school_id' => $this->input->post('school_id', true),
            'name'      => $this->input->post('name', true),
            'email'     => $this->input->post('email', true),
            'phone'     => $this->input->post('phone', true),
            'address'   => $this->input->post('address', true),
        ];

        if (empty($data['school_id']) || empty($data['name'])) {
            $this->session->set_flashdata('error', 'School ID and Name required');
            return redirect('superadmin/schools/create');
        }

        $result = $this->api_helper->create_school($data);

        if ($this->api_helper->response_success($result)) {
            $this->session->set_flashdata('success', $this->api_helper->response_message($result, 'School created successfully'));
            redirect('superadmin/schools');
            return;
        }

        $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Failed to create school'));
        redirect('superadmin/schools/create');
    }
}
