<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'api_helper']);
        $this->load->helper(['url']);

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
    }

    public function index() {
        $school_id = (string) $this->session->userdata('school_id');
        $students_result = $this->api_helper->get_all_students($school_id);
        $students = $this->api_helper->response_success($students_result)
            ? $this->api_helper->response_data($students_result)
            : [];
        $students = $this->filter_students_by_school($students, $school_id);

        $data = [
            'title'          => 'Admin Dashboard',
            'email'          => $this->session->userdata('email'),
            'school_id'      => $school_id,
            'total_students' => is_array($students) ? count($students) : 0,
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
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
