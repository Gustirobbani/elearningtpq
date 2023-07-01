<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function reset_password()
    {
        // Memvalidasi input
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE)
        {
            // Jika validasi gagal, tampilkan form reset password kembali dengan error
            $data['user_id'] = $this->input->post('user_id');
            $data['reset_token'] = $this->input->post('reset_token');
            $this->load->view('user/reset_password', $data);
        }
        else
        {
            // Simpan password baru ke dalam database
            $new_password = $this->input->post('new_password');
            $user_id = $this->input->post('user_id');
            
            // Lakukan operasi penyimpanan password baru ke dalam database sesuai dengan kebutuhan aplikasi Anda
            
            // Tampilkan pesan sukses jika berhasil mereset password
            echo "Password has been reset successfully!";
        }
    }

}
