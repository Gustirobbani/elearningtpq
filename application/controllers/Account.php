<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_account');
    }
	public function forgot_password()
{
    $this->load->view('lupa_password');
}

public function reset_password()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $this->input->post('email');
        $token = ''; // Tambahkan definisi variabel $token di sini
        // Konfigurasi email
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $config['smtp_port'] = 587; // Ganti dengan port SMTP Anda
        $config['smtp_user'] = 'gustirb133@gmail.com'; // Ganti dengan email pengirim
        $config['smtp_pass'] = 'gusti1234_'; // Ganti dengan password email pengirim
        $config['smtp_crypto'] = 'tls'; // Ganti dengan protokol keamanan yang sesuai, misalnya tls atau ssl
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = true;

        // Load library email dan set konfigurasi
        $this->load->library('email');
        $this->email->initialize($config);

        // Mengatur email penerima, subjek, dan isi email
        $this->email->from('gustirb133@gmail.com', 'Nama Pengirim');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('Silakan klik link berikut untuk mereset password Anda:' . base_url('account/reset_password_form?token=' . $token));

        if ($this->email->send()) {
            echo "Email reset password telah dikirim ke $email";
        } else {
            echo "Gagal mengirim email reset password";
        }
    }
}

public function reset_password_form()
{
    $token = $this->input->get('token');

    // Verifikasi token
    $user_info = $this->m_account->isTokenValid($token);
    if ($user_info) {
        $data['token'] = $token;
        $this->load->view('reset_password_form', $data);
    } else {
        echo "Token reset password tidak valid";
    }
}
public function update_password()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $this->input->post('token');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        // Verifikasi token
        $user_info = $this->m_account->isTokenValid($token);
        if ($user_info) {
            // Validasi password
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() === TRUE) {
                // Update password
                $post = array(
                    'id_user' => $user_info->id,
                    'password' => $password
                );

                if ($this->m_account->updatePassword($post)) {
                    echo "Password berhasil diperbarui";
                } else {
                    echo "Gagal memperbarui password";
                }
            } else {
                // Validasi gagal, tampilkan kembali form reset password dengan pesan error
                $this->load->view('reset_password_form');
            }
        } else {
            echo "Token reset password tidak valid";
        }
    }
}



}
