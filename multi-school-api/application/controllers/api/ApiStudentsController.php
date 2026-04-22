<?php

    use chriskacerguis\RestServer\RestController;

    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';
    //use chriskacerguis\RestServer\RestController;

    class ApiStudentsController extends RestController
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('StudentsModel');
        }

        private function getRequestValue($key)
        {
            $value = $this->post($key);

            if ($value === null || $value === '') {
                $value = $this->input->post($key);
            }

            if (($value === null || $value === '') && strpos((string) $this->input->server('CONTENT_TYPE'), 'application/json') !== false) {
                $payload = json_decode($this->input->raw_input_stream, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($payload) && array_key_exists($key, $payload)) {
                    $value = $payload[$key];
                }
            }

            if (is_string($value)) {
                $value = trim($value);
            }

            return $value;
        }

        public function index_get()
        {
            // echo "I am Student idx fun";
            $students = new StudentsModel;
            $result_stud = $students->get_students();
            $this->response($result_stud, 200);
        }
        public function storeStudents_post()
        {
            $students = new StudentsModel;
            $data = [
                'school_id' => $this->getRequestValue('school_id'),
                'student_id' => $this->getRequestValue('student_id'),
                'name' => $this->getRequestValue('name'),
                'email' => $this->getRequestValue('email'),
                'course' => $this->getRequestValue('course'),
                'gender' => $this->getRequestValue('gender'),
                'status' => 1
            ];

            if (!$data['school_id'] || !$data['student_id'] || !$data['name'] || !$data['email']) {
                $this->response([
                    'status' => false,
                    'message' => 'school_id, student_id, name and email are required'
                ], RestController::HTTP_BAD_REQUEST);
                return;
            }

            $result = $students->insertStudents($data);
            // $this->response($data, 200);

            if($result)
            {
                $this->response([
                    'status' => true,
                    'message' => 'NEW STUDENT CREATED'
                ], RestController::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => false,
                    'message' => 'FAILED TO CREATE NEW STUDENT'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

        public function findStudents_get($id)
        {
            $students = new StudentsModel;
            $result = $students->findStudents($id);
            $this->response($result, 200);
        }

        public function updateStudents_put($id)
        {
            $students = new StudentsModel;
            $data = [
                'school_id' => $this->put('school_id'),
                'student_id' => $this->put('student_id'),
                'name' => $this->put('name'),
                'email' => $this->put('email'),
                'course' => $this->put('course'),
                'gender' => $this->put('gender'),
                'status' => $this->put('status')
            ];
            $update_result = $students->update_Students($id, $data);

            if($update_result > 0)
            {
                $this->response([
                    'status' => true,
                    'message' => 'STUDENT UPDATED'
                ], RestController::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => false,
                    'message' => 'FAILED TO UPDATE STUDENT'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

        public function deleteStudents_delete($id)
        {
            $students = new StudentsModel;
            $result = $students->delete_Students($id);

            if($result > 0)
            {
                $this->response([
                    'status' => true,
                    'message' => 'STUDENT DELETED'
                ], RestController::HTTP_OK);
            }
            else
            {
                $this->response([
                    'status' => false,
                    'message' => 'FAILED TO DELETE STUDENT'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

        public function bySchool_get($school_id)
        {
            if (!$school_id) {
                $this->response([
                    'status' => false,
                    'message' => 'school_id required'
                ], 400);
                return;
            }

            $students = $this->db->where('school_id', $school_id)->get('students')->result_array();

            $this->response([
                'status' => true,
                'data' => $students
            ], 200);
        }
    }
?>
