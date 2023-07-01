<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/guru');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('guru', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('guru/index');
    }
	public function showVideo()
	{
		$this->load->model('upload_model');
		$data['video'] = $this->upload_model->tampil_data()->result();
		$this->load->view('guru/video_list', $data);
	}
	public function viewVideoList($classId) {
        // Mendapatkan informasi video list

        // Mendapatkan data komentar dari database
        $this->load->model('Comments_model');
        $data['comments'] = $this->Comments_model->getComments($classId);

        // Memproses penambahan komentar
        if ($this->input->post('submit')) {
            $commentData = array(
                'class_id' => $classId,
                'comment' => $this->input->post('comment')
            );
            $this->Comments_model->addComment($commentData);

            // Mendapatkan data komentar yang baru saja diunggah
            $data['submittedComment'] = $this->Comments_model->getCommentById($this->db->insert_id());
        }

        $this->load->view('guru/video_list', $data);
    }

    public function addComment() {
        // Memproses penambahan komentar
        if ($this->input->post('submit')) {
            $classId = $this->input->post('classId');
            $commentData = array(
                'class_id' => $classId,
                'comment' => $this->input->post('comment')
            );
            $this->load->model('Comments_model');
            $this->Comments_model->addComment($commentData);
        }

        // Redirect ke halaman video_list setelah penambahan komentar
        redirect('guru/viewVideoList/' . $classId);
    }
    public function add_materi()

    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/add_materi');
        } else {
	
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'mp4|mkv';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi_video';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('guru'));
        }
    }
	

    private function _uploadImage()
    {
        $config['upload_path'] = './assets/materi_video';
        $config['allowed_types'] = 'mp4|mkv';
        $config['file_name'] = $this->product_id;
        $config['overwrite'] = true;
        $config['max_size'] = 0; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.mp4";
    }
}
