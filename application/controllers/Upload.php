<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('upload_model');
    }

    public function index() {
        $this->load->view('materi/hafalan_a');
        $this->load->view('materi/hafalan_b');
        $this->load->view('materi/hafalan_c');
    }

    public function do_upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pastikan file telah dipilih
            if (isset($_FILES['Video']) && $_FILES['Video']['error'] === UPLOAD_ERR_OK) {
                $nama_hafalan = $this->input->post('nama_hafalan');
                
                // Proses upload file
                $file_name = $_FILES['Video']['name'];
                $file_tmp = $_FILES['Video']['tmp_name'];
                $upload_path = 'assets/video/' . $file_name;
                
                if (move_uploaded_file($file_tmp, $upload_path)) {
                    // Data file untuk disimpan ke database
                    $data = array(
                        'nama_hafalan' => $nama_hafalan,
                        'file_name' => $file_name
                    );
                    
                    // Simpan data file ke database
                    $file_id = $this->upload_model->save_file($data);
                    
                    if ($file_id) {
                        echo "File berhasil diunggah dan disimpan ke database.";
                    } else {
                        echo "Gagal menyimpan data file ke database.";
                    }
                } else {
                    echo "Gagal mengunggah file.";
                }
            } else {
                echo "Anda belum memilih file untuk diunggah.";
            }
        }
    }
}
