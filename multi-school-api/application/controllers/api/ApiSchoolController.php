<?php
    use chriskacerguis\RestServer\RestController;

    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';

    class ApiSchoolController extends RestController
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('SchoolModel');
        }

        private function getRequestValue($key)
        {
            $value = $this->post($key);

            if ($value === null || $value === '') {
                $value = $this->input->post($key);
            }

            if (is_string($value)) {
                $value = trim($value);
            }

            return $value;
        }

        public function index_get()
        {
            $result_sch = $this->SchoolModel->get_schools();
            $this->response($result_sch, 200);
        }

        public function storeSchool_post()
        {
            $data = [
                'name' => $this->getRequestValue('name'),
                'school_id' => $this->getRequestValue('school_id'),
                'email' => $this->getRequestValue('email'),
                'phone' => $this->getRequestValue('phone'),
                'address' => $this->getRequestValue('address'),
                'status' => 1
            ];

            if (!$data['name'] || !$data['school_id'] || !$data['email']) {
                $this->response([
                    'status' => false,
                    'message' => 'name, school_id and email are required'
                ], RestController::HTTP_BAD_REQUEST);
                return;
            }

            $result = $this->SchoolModel->insertSchool($data);

            if ($result){
                $this->response([
                    'status' => true,
                    'message' => 'NEW SCHOOL CREATED'
                ], RestController::HTTP_OK);
            } 
            else {
                $this->response([
                    'status' => false,
                    'message' => 'FAILED TO CREATE NEW SCHOOL'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

        public function findSchool_get($id)
        {
            $result = $this->SchoolModel->findSchool($id);
            $this->response($result,200);

        }

        public function updateSchool_put($id)
        {
                $data = [
                'name' => $this->put('name'),
                'school_id' => $this->put('school_id'),
                'email' => $this->put('email'),
                'phone' => $this->put('phone'),
                'address' => $this->put('address'),
                'status' => $this->put('status')
            ];

            $result = $this->SchoolModel->updateSchool($id, $data);

            if ($result) {
                $this->response([
                    'status' => true,
                    'message' => 'SCHOOL UPDATED'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'FAILED TO UPDATE SCHOOL'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }

        

        public function deleteSchool_delete($id)
        {
            $result = $this->SchoolModel->deleteSchool($id);

            if($result) {
                $this->response([ 
                    'status'=> true,
                    'message'=> 'School Deleted'
                ], RestController::HTTP_OK);
            } 
            else {
                $this->response([
                    'status'=> false,
                    'message'=> 'Failed To Delete School'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }
?>
