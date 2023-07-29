<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Account extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get siswa by email
    public function get_siswa_by_email($email) {
        $query = $this->db->get_where('siswa', array('email' => $email));
        return $query->row_array();
    }
	public function get_guru_by_email($email) {
        $query = $this->db->get_where('guru', array('email' => $email));
        return $query->row_array();
    }

    // Simpan kode verifikasi ke dalam tabel reset_password_siswa
    public function insertToken($id, $token, $email) {
        $data = array(
            'user_id' => $id,
            'token' => $token,
            'email' => $email,
			'nip' => $id
        );
        $this->db->insert('reset_password', $data);
    }

    // Get siswa by token from reset_password_siswa table
	public function get_siswa_by_token($token) {
        $this->db->where('token', $token);
        $query = $this->db->get('reset_password');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_guru_by_token($token) {
        $this->db->where('token', $token);
        $query = $this->db->get('reset_password');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return null;
        }
    }
	
    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('reset_password', array(
            'token' => $tkn,
            'user_id' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->get_siswa_by_email($row->email);
            return $user_info;
        } else {
            return false;
        }
    }

    // Update siswa passwor
	public function update_password_siswa($siswa_id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa', array('password' => $hashed_password));
    }

    public function update_teacher_password($nip, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $this->db->where('nip', $nip);
        return $this->db->update('guru', array('password' => $hashed_password));
    }
}
