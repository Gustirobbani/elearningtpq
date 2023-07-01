<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('Token');
    }

    public function your_method() {
        // Generate token
        $token = $this->token->generateToken();

        // Simpan token dalam variabel atau kirimkan ke view
        $data['token'] = $token;

        // Load view dengan membawa data token
        $this->load->view('reset_password_form', $data);
    }

    public function your_form_submission() {
        // Ambil token dari input form yang dikirimkan oleh user
        $token = $this->input->post('token');

        // Validasi token
        if ($this->token->validateToken($token)) {
            // Token valid, lakukan tindakan yang diperlukan
        } else {
            // Token tidak valid, lakukan tindakan yang sesuai
        }
    }
}
