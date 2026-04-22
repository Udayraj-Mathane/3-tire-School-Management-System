<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['api_helper', 'session']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
    }

    private function load_view($view, $data = []) {
        $this->load->view('admin/layout/header', $data);
        $this->load->view("admin/students/$view", $data);
        $this->load->view('admin/layout/footer');
    }

    public function index() {
        $school_id = (string) $this->session->userdata('school_id');
        $result = $this->api_helper->get_all_students($school_id);

        $data = [
            'title'     => 'All Students',
            'students'  => [],
            'api_error' => null
        ];

        if ($this->api_helper->response_success($result)) {
            $students = $this->api_helper->response_data($result);
            $data['students'] = $this->filter_students_by_school($students, $school_id);
        } else {
            $data['api_error'] = $this->api_helper->response_message($result, 'Could not fetch students.');
        }

        $this->load_view('index', $data);
    }

    public function create() {
        $this->load_view('create', ['title' => 'Add New Student']);
    }

    public function store() {
        if ($this->input->method() !== 'post') {
            return redirect('admin/students/create');
        }

        $data = $this->get_post_data();

        if (!$this->validate($data)) {
            return redirect('admin/students/create');
        }

        $result = $this->api_helper->create_student($data);
        $success = $this->api_helper->response_success($result);

        $this->set_api_message($result, 'Student added successfully!', 'Failed to add student.');
        redirect($success ? 'admin/students' : 'admin/students/create');
    }

    public function edit($id) {
        $result = $this->api_helper->get_student($id);

        if (!$this->api_helper->response_success($result)) {
            $this->session->set_flashdata('error', $this->api_helper->response_message($result, 'Student not found.'));
            return redirect('admin/students');
        }

        $student = $this->api_helper->response_data($result);

        $this->load_view('edit', [
            'title'   => 'Edit Student',
            'student' => is_array($student) ? $student : []
        ]);
    }

    public function update($id) {
        if ($this->input->method() !== 'post') {
            return redirect('admin/students');
        }

        $data = $this->get_post_data();

        if (!$this->validate($data)) {
            return redirect("admin/students/edit/$id");
        }

        $result = $this->api_helper->update_student($id, $data);
        $success = $this->api_helper->response_success($result);

        $this->set_api_message($result, 'Student updated successfully!', 'Failed to update student.');
        redirect($success ? 'admin/students' : "admin/students/edit/$id");
    }

    public function delete($id) {
        $result = $this->api_helper->delete_student($id);
        $this->set_api_message($result, 'Student deleted successfully!', 'Failed to delete student.');
        redirect('admin/students');
    }

    private function get_post_data() {
        return [
            'school_id'  => $this->session->userdata('school_id'),
            'student_id' => $this->input->post('student_id', true),
            'name'       => $this->input->post('name', true),
            'email'      => $this->input->post('email', true),
            'course'     => $this->input->post('course', true),
            'gender'     => $this->input->post('gender', true),
        ];
    }

    private function validate($data) {
        if (empty($data['student_id']) || empty($data['name']) || empty($data['email'])) {
            $this->session->set_flashdata('error', 'Student ID, Name and Email are required.');
            return false;
        }

        return true;
    }

    private function set_api_message($result, $success_msg, $error_msg) {
        $success = $this->api_helper->response_success($result);
        $message = $this->api_helper->response_message($result, $success ? $success_msg : $error_msg);

        $this->session->set_flashdata($success ? 'success' : 'error', $message);
    }

    private function filter_students_by_school($students, $school_id) {
        if (!is_array($students)) {
            return [];
        }

        if ($school_id === '') {
            return $students;
        }

        return array_values(array_filter($students, function ($student) use ($school_id) {
            if (!is_array($student)) {
                return false;
            }

            $student_school_id = '';

            if (isset($student['school_id'])) {
                $student_school_id = (string) $student['school_id'];
            } elseif (isset($student['schoolId'])) {
                $student_school_id = (string) $student['schoolId'];
            }

            return $student_school_id === $school_id;
        }));
    }
}
