<?php 
    use chriskacerguis\RestServer\RestController;

    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';

    class AdminController extends RestController
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('UserModel');
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

        public function createAdmin_post()
        {
            $schoolId = $this->getRequestValue('school_id');
            $email = $this->getRequestValue('email');
            $password = $this->getRequestValue('password');

            if (!$schoolId || !$email || !$password) {
                $this->response([
                    'status' => false,
                    'message' => 'school_id, email and password are required'
                ], RestController::HTTP_BAD_REQUEST);
                return;
            }

            if ($this->UserModel->findUserByEmail($email)) {
                $this->response([
                    'status' => false,
                    'message' => 'Email already exists'
                ], 409);
                return;
            }

            $data = [
                'school_id' => $schoolId,
                'email' => $email,
                'password' => $password,
                'role' => 'admin',
                'ref_id' => 0
            ];

            $result = $this->UserModel->insertUser($data);

            if($result){
                $this->response(['status' => true, 'message' => 'Admin Create'], RestController::HTTP_OK);
            }
            else{
                $this->response(['status'=> false, 'message'=> 'Failed'], RestController::HTTP_BAD_REQUEST);
            }
        }
        public function index_get()
        {
            $admins = $this->UserModel->getUsersByRole('admin');

            if (!empty($admins)) {
                $this->response([
                    'status' => true,
                    'data'   => $admins
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No admins found',
                    'data' => []
                ], RestController::HTTP_OK);
            }
        }
        
    }
?>
