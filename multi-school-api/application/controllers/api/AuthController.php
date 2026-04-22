<?php 
    use chriskacerguis\RestServer\RestController;

    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';

    class AuthController extends RestController 
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

            if (is_string($value)) {
                $value = trim($value);
            }

            return $value;
        }

        public function register_post()
        {
            $schoolId = $this->getRequestValue('school_id');
            $email = $this->getRequestValue('email');
            $password = $this->getRequestValue('password');
            $role = $this->getRequestValue('role');
            $refId = $this->getRequestValue('ref_id');

            if (!$schoolId || !$email || !$password || !$role) {
                $this->response([
                    'status' => false,
                    'message' => 'school_id, email, password and role are required'
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
                'role' => $role,
                'ref_id' => $refId
            ];

            $result = $this->UserModel->insertUser($data);

            if ($result) {
                $this->response(['status' => true, 'message' => 'User Registered'], RestController::HTTP_OK);
            }
            else { 
                $this->response(['status'=> false,'message'=> 'Failed'], RestController::HTTP_BAD_REQUEST);
            }
        }

        public function login_post()
        {
            $email = $this->getRequestValue('email');
            $password = $this->getRequestValue('password');

            if (!$email || !$password) {
                $this->response([
                    'status' => false,
                    'message' => 'email and password are required'
                ], RestController::HTTP_BAD_REQUEST);
                return;
            }

            $user = $this->UserModel->findUserByEmail($email);

            $passwordMatches = false;

            if ($user) {
                $passwordMatches = ($password === $user['password']);

                if (!$passwordMatches && password_get_info($user['password'])['algo'] !== null) {
                    $passwordMatches = password_verify($password, $user['password']);
                }
            }

            if ($user && $passwordMatches) {
                $this->response([
                    'status'=> true,
                    'message'=> 'Login Success',
                    'data' => $user
                    ], RestController::HTTP_OK);
            }
            else {
                $this->response([
                    'status' => false,
                    'message' => 'INVALID CREDENTIALS'
                ], RestController::HTTP_UNAUTHORIZED);
            }
        }
    }

?>
