<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('string');
    }

    public function generateToken() {
        $token = random_string('alnum', 32); // Menghasilkan token acak dengan panjang 32 karakter
        $this->CI->session->set_userdata('token', $token); // Menyimpan token ke dalam session

        return $token;
    }

    public function validateToken($token) {
        $storedToken = $this->CI->session->userdata('token'); // Mengambil token dari session

        if ($token === $storedToken) {
            $this->CI->session->unset_userdata('token'); // Menghapus token dari session setelah validasi berhasil
            return true;
        }

        return false;
    }
}
