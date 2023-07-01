<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Account extends CI_Model
{
    public function daftar($data)
    {
        $this->db->insert('reset_password', $data);
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('siswa', array('id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('siswa', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
   
        return false;
    }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('token', $string);
        $this->db->query($query);
        return $token;
    }

    public function isTokenValid($token)
    {
        $q = $this->db->get_where('siswa', array('token' => $token), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('siswa', $post['reset_password']);
        $this->db->update('siswa', array('password' => $post['password']));
        return true;
    }

    public function sendResetPasswordEmail($email)
    {
        $user = $this->getUserInfoByEmail($email);
        if ($user) {
            $token = $this->insertToken($user->id);

            // Kirim email reset password ke pengguna
            $this->load->library('email');

            $this->email->from('gustirb133@gmail.com', 'Nama Pengirim');
            $this->email->to($email);
            $this->email->subject('Reset Password');
            $this->email->message("Halo, silakan klik link berikut untuk mereset password Anda: " . base_url('account/reset_password_form?token=' . $token));

            if ($this->email->send()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
	public function reset_password()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $this->input->post('email');

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
        $this->email->message('Silakan klik link berikut untuk mereset password Anda: <a href="https://www.example.com/reset_password.php?email='.$email.'">Reset Password</a>');

        if ($this->email->send()) {
            echo "Email reset password telah dikirim ke $email";
        } else {
            echo "Gagal mengirim email reset password";
        }
    }
}
}
