<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_helper {

    // FIXED BASE URL (COMMON FOR ALL APIs)
    private $base_url = 'http://localhost/multi-school-api/index.php/api';

    private $auth;
    private $api_key = 'funda123';

    public function __construct() {
        $this->auth = base64_encode('admin:1234');
    }

    private function headers($content_type = 'application/json') {
        return [
            "Authorization: Basic {$this->auth}",
            "X-API_KEY: {$this->api_key}",
            "Content-Type: {$content_type}",
            "Accept: application/json",
        ];
    }

    private function request($endpoint, $method = 'GET', $data = null, $content_type = 'application/json') {
        $ch = curl_init();

        $payload = null;

        if ($data !== null) {
            $payload = $content_type === 'application/json'
                ? json_encode($data)
                : http_build_query($data);
        }

        curl_setopt_array($ch, [
            CURLOPT_URL            => $this->base_url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTPHEADER     => $this->headers($content_type),
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        if ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

            if ($payload !== null) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            }
        }

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            return ['success' => false, 'data' => $error, 'http_code' => $http_code];
        }

        return [
            'success' => ($http_code >= 200 && $http_code < 300),
            'data'    => json_decode($response, true) ?? $response,
            'http_code' => $http_code,
        ];
    }

        // STUDENT APIs

    public function get_all_students($school_id = null) {
        $endpoint = '/students';
        if ($school_id) {
            $endpoint .= '?school_id=' . $school_id;
        }
        return $this->request($endpoint);
    }

    public function get_student($id) {
        return $this->request("/students/edit/$id");
    }

    public function create_student($data) {
        return $this->request('/students/store', 'POST', $data, 'application/x-www-form-urlencoded');
    }

    public function update_student($id, $data) {
        return $this->request("/students/update/$id", 'PUT', $data, 'application/x-www-form-urlencoded');
    }

    public function delete_student($id) {
        return $this->request("/students/delete/$id", 'DELETE');
    }

    public function get_students_by_school($school_id) {
        return $this->request("/school/$school_id");
    }

        // SCHOOL APIs

    public function get_schools() {
        return $this->request('/schools');
    }

    public function create_school($data) {
        return $this->request('/schools/store', 'POST', $data, 'application/x-www-form-urlencoded');
    }

        // ADMIN APIs

    public function create_admin($data) {
        return $this->request('/register', 'POST', $data, 'application/x-www-form-urlencoded');
    }

    public function get_admins() {
        return $this->request('/admins');
    }

        // AUTH APIs


    public function login($data) {
        return $this->request('/login', 'POST', $data, 'application/x-www-form-urlencoded');
    }

    public function register($data) {
        return $this->request('/register', 'POST', $data, 'application/x-www-form-urlencoded');
    }

    public function response_success($result) {
        $body = $result['data'] ?? [];

        if (!($result['success'] ?? false)) {
            return false;
        }

        if (is_array($body) && array_key_exists('status', $body)) {
            return (bool) $body['status'];
        }

        return true;
    }

    public function response_data($result) {
        $body = $result['data'] ?? [];

        if (is_array($body) && array_key_exists('data', $body)) {
            return $body['data'];
        }

        return $body;
    }

    public function response_message($result, $default = 'Something went wrong.') {
        $body = $result['data'] ?? [];

        if (is_array($body) && !empty($body['message'])) {
            return $body['message'];
        }

        if (is_string($body) && $body !== '') {
            return $body;
        }

        return $default;
    }

}
