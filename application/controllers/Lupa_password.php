<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controllers/ForgotPassword.php

class ForgotPassword extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library('email'); // Load library email untuk mengirim email konfirmasi
    $this->load->model('m_siswa'); // Load model User_model (ganti dengan model Anda)
  }
  
  public function index() {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    
    if ($this->form_validation->run() == FALSE) {
      // Validasi gagal, tampilkan kembali form dengan pesan error
      $this->load->view('lupa_password');
    } else {
      // Validasi berhasil, proses reset password
      $email = $this->input->post('email');
      $user = $this->m_siswa->getUserByEmail($email); // Ganti dengan method Anda untuk mendapatkan user berdasarkan email
      
      if ($user) {
        // Generate token unik untuk reset password
        $token = bin2hex(random_bytes(20));
        
        // Simpan token dan email pengguna ke database (ganti dengan method Anda)
        $this->m_siswa->saveResetToken($user['id'], $token);
        
        // Konfigurasi email
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'gustirbb133@gmail.com';
        $config['smtp_pass'] = 'gusti1234_';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        
        // Kirim email konfirmasi reset password
        $this->email->from('gustirb133@gmail.com', 'Gusti robbani');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('Silakan klik link berikut untuk mereset password Anda: ' . base_url('reset_password/' . $token));
        
        if ($this->email->send()) {
          // Email berhasil dikirim, tampilkan pesan sukses
          $data['message'] = 'Email konfirmasi reset password telah dikirim ke ' . $email;
          $this->load->view('sukses_password', $data);
        } else {
          // Email gagal dikirim, tampilkan pesan error
          $data['message'] = 'Terjadi kesalahan saat mengirim email. Silakan coba lagi.';
          $this->load->view('lupa_password', $data);
        }
      } else {
        // User tidak ditemukan, tampilkan pesan error
        $data['message'] = 'Email tidak ditemukan.';
        $this->load->view('lupa_password', $data);
      }
    }
  }
}
