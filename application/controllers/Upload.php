<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('upload_model');
    }

    public function index() {
        $data['kelasA'] = $this->load->view('materi/hafalan_a', '', TRUE);
        $data['kelasB'] = $this->load->view('materi/hafalan_b', '', TRUE);
        $data['kelasC'] = $this->load->view('materi/hafalan_c', '', TRUE);

        $this->load->view('materi/index', $data);
    }

	public function do_upload() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Make sure the file has been selected
			if (isset($_FILES['Video']) && $_FILES['Video']['error'] === UPLOAD_ERR_OK) {
				$nama_hafalan = $this->input->post('nama_hafalan');
				$kelas = $this->input->post('kelas');
	
				// Retrieve the student's data who is currently logged in
				$user = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
				$id_siswa = $user['id'];
				$nama = $user['nama'];
				$email = $user['email'];
	
				// Ensure that 'id_siswa', 'nama', and 'email' are not empty before calling the save_file function
				if ($id_siswa !== null && $id_siswa !== '' && $nama !== null && $nama !== '' && $email !== null && $email !== '') {
	
					// Process the uploaded file
					$file_name = $_FILES['Video']['name'];
					$file_tmp = $_FILES['Video']['tmp_name'];
					$upload_dir = 'assets/video/' . $kelas . '/';
	
					// Save the file to the directory
					move_uploaded_file($file_tmp, $upload_dir . $file_name);
	
					// Save the file data to the database
					$this->upload_model->save_file($id_siswa, $nama, $email, $nama_hafalan, $kelas, $file_name);
					$this->session->set_userdata('id_siswa', $id_siswa);
	
					// Set flash data for success message
					$this->session->set_flashdata('success-upload', 'File berhasil diupload.');
	
					// Redirect back to the corresponding "materi/hafalan" page based on the class (kelas)
					redirect('materi/hafalan_' . strtolower($kelas));
				} else {
					echo '<i class="fa fa-times-circle" aria-hidden="true"></i> Failed to upload the file.';
				}
			}
		}
	}
}	
