<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Account');
        $this->load->library('email');
    }

	public function reset_password() {
		$email = $this->input->post('email');
	
		// Check if email exists in the student table
		$siswa = $this->M_Account->get_siswa_by_email($email);
	
		// If not found in student table, check in the teacher table
		if (!$siswa) {
			$guru = $this->M_Account->get_guru_by_email($email);
		}
	
		if ($siswa) {
			// Generate verification code
			$token = bin2hex(random_bytes(16));
	
			// Save the verification code and student data to the reset_password_siswa table
			$this->M_Account->insertToken($siswa['id'], $token, $siswa['email'], $siswa['nip']);
	
			// Redirect to the reset password form with the token as a parameter
			redirect(base_url("account/reset_password_form/$token"));
		} elseif ($guru) {
			// Generate verification code
			$token = bin2hex(random_bytes(16));
	
			// Save the verification code and teacher data to the reset_password_guru table
			$this->M_Account->insertToken($guru['nip'], $token, $guru['email'],);
	
			// Redirect to the reset password form with the token as a parameter
			redirect(base_url("account/reset_password_form/$token"));
		} else {
			// Email not found in both tables, show an error message
			$data['error'] = 'Email not found in the database.';
			$this->load->view('lupa_password', $data);
		}
	}
	
	
	public function lupa_password() {
        $data['title'] = 'lupa_password';
        $this->load->view('lupa_password', $data);
    }
    private function send_verification_email($email, $token) {
        // Konfigurasi email
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'tpqmuslimatalquthubi@gmail.com';
        $config['smtp_pass'] = 'qgakdmicihohqjxw';
        $config['smtp_port'] = 587;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        // Kirim email verifikasi
        $this->email->from('tpqmuslimatalquthubi@gmail.com', 'Tpq Muslimat Al-Quthubi');
        $this->email->to($email);
        $this->email->subject('Reset Password Verification');
        $this->email->message("Click the link to reset your password: " . base_url("reset_password_form/$token"));

        // Coba kirim email
        if ($this->email->send()) {
            // Email terkirim dengan sukses, tidak perlu ada tindakan tambahan
        } else {
            // Terjadi kesalahan saat mengirim email, atur pesan error
            $this->error_message = 'Failed to send verification email. Please try again later.';
        }
    }

	public function reset_password_form($token) {
		// Cek apakah token ada di database
		$user = $this->M_Account->get_siswa_by_token($token);
	
		if ($user) {
			// Token ditemukan, tampilkan halaman reset password dengan token
			$data['token'] = $token;
			$this->load->view('account/reset_password_form', $data);
		} else {
			// Token tidak valid, tampilkan pesan error atau redirect ke halaman lain
			$data['error'] = 'Invalid token or token has expired.';
			$this->load->view('user/reset_password_error', $data); // Ganti 'reset_password_error' dengan nama view yang sesuai untuk menampilkan pesan error
		}
	}	


    public function reset_password_submit() {
        $token = $this->input->post('token');
        $new_password = $this->input->post('new_password');

        // Check if the token exists in the database and retrieve user data
        $user = $this->M_Account->get_siswa_by_token($token);

        if ($user) {
            // Update password in the database for students (siswa)
            $this->M_Account->update_password_siswa($user['id'], $new_password);

            // Password berhasil direset, tampilkan pesan sukses
			if ($user) {
                $this->M_Account->update_password_siswa($user['id'], $new_password);

                // Password berhasil direset, tampilkan pesan sukses
                $data['message'] = 'Password reset successful! You can now log in with your new password.';
                $this->load->view('account/reset_password_form', $data);
            } else {
                // Token tidak valid, tampilkan pesan error atau redirect ke halaman lain
                $data['error'] = 'Invalid token or token has expired.';
                $this->load->view('error_page', $data);
            }
        } else {
            // Check if the token belongs to a teacher (guru) and update teacher password
            $teacher = $this->M_Account->get_guru_by_token($token);

            if ($teacher) {
                $this->M_Account->update_teacher_password($teacher['nip'], $new_password);

                // Password berhasil direset, tampilkan pesan sukses
                $data['message'] = 'Password reset successful! You can now log in with your new password.';
                $this->load->view('account/reset_password_form', $data);
            } else {
                // Token tidak valid, tampilkan pesan error atau redirect ke halaman lain
                $data['error'] = 'Invalid token or token has expired.';
                $this->load->view('error_page', $data);
            }
        }
    }
}
	