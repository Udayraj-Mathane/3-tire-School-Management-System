<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(['session', 'api_helper']);
        $this->load->helper(['url']);

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        if ($this->session->userdata('role') !== 'student') {
            redirect('login');
        }
    }

    private function load_view($view, $data = []) {
        $this->load->view('admin/layout/header', $data);
        $this->load->view("student/$view", $data);
        $this->load->view('admin/layout/footer');
    }

    public function index() {
        $student = $this->get_student_profile();

        $data = [
            'title'      => 'My Profile',
            'student_id' => $student['student_id'] ?? $this->session->userdata('student_id'),
            'name'       => $student['name'] ?? $this->session->userdata('name'),
            'email'      => $student['email'] ?? $this->session->userdata('email'),
        ];

        $this->load_view('profile', $data);
    }

    public function update() {
        if ($this->input->method() !== 'post') {
            return redirect('student/profile');
        }

        $id = $this->session->userdata('ref_id');

        if (!$id) {
            $this->session->set_flashdata('error', 'Student profile reference is missing.');
            return redirect('student/profile');
        }

        $data = [
            'name'  => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
        ];

        $result = $this->api_helper->update_student($id, $data);

        if ($this->api_helper->response_success($result)) {
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success', $this->api_helper->response_message($result, 'Profile updated!'));
        } else {
            $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Update failed.'));
        }

        redirect('student/profile');
    }

    private function get_student_profile() {
        $ref_id = $this->session->userdata('ref_id');

        if (!$ref_id) {
            return [];
        }

        $result = $this->api_helper->get_student($ref_id);

        if (!$this->api_helper->response_success($result)) {
            return [];
        }

        $student = $this->api_helper->response_data($result);

        if (is_array($student)) {
            $this->session->set_userdata([
                'name'       => $student['name'] ?? $this->session->userdata('name'),
                'email'      => $student['email'] ?? $this->session->userdata('email'),
                'student_id' => $student['student_id'] ?? $this->session->userdata('student_id'),
            ]);
        }

        return is_array($student) ? $student : [];
    }
}
