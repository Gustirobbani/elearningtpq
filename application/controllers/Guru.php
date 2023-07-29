<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar_model', 'komentar_model');
        $this->load->model('Upload_model', 'upload_model');
		$this->load->model('M_guru', 'm_guru');
		$this->load->model('Video_model', 'video_model');
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

    public function showVideoA($id_siswa)
{
    $video = $this->upload_model->getAllDataByNama($id_siswa);
    $data['video'] = $video;
    $data['id_siswa'] = $id_siswa;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $komen = $this->input->post('komen');

        // Simpan komentar ke dalam database menggunakan model atau lakukan operasi lain yang diperlukan

        $this->session->set_flashdata('success', 'Komentar berhasil ditambahkan.');
        redirect('guru/showVideoA/'.$id_siswa);
    }

    $this->load->view('guru/showVideoA', $data);
}


public function showVideoB($id_siswa)
{
    $video = $this->upload_model->getAllDataByNama($id_siswa);
    $data['video'] = $video;
    $data['id_siswa'] = $id_siswa;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $komen = $this->input->post('komen');

        // Simpan komentar ke dalam database menggunakan model atau lakukan operasi lain yang diperlukan

        $this->session->set_flashdata('success', 'Komentar berhasil ditambahkan.');
        redirect('guru/showVideoB/'.$id_siswa);
    }

    $this->load->view('guru/showVideoB', $data);
}

public function showVideoC($id_siswa)
{
    $video = $this->upload_model->getAllDataByNama($id_siswa);
    $data['video'] = $video;
    $data['id_siswa'] = $id_siswa;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $komen = $this->input->post('komen');

        // Simpan komentar ke dalam database menggunakan model atau lakukan operasi lain yang diperlukan

        $this->session->set_flashdata('success', 'Komentar berhasil ditambahkan.');
        redirect('guru/showVideoC/'.$id_siswa);
    }

    $this->load->view('guru/showVideoC', $data);
}
	

    public function viewHafalan()
    {
        $data['hafalan'] = $this->m_guru->getHafalan();
        $data['comments'] = $this->comments_model->getComments();
        $this->load->view('guru/hafalan', $data);
    }

    public function kelasA()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasA');
        $this->load->view('template/footer');
    }

    public function kelasB()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasB');
        $this->load->view('template/footer');
    }

    public function kelasC()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasC');
        $this->load->view('template/footer');
    }

    public function showNamaA()
    {
        $data['uploads'] = $this->upload_model->getNamaByKelas('A');
        $data['nama_hafalan'] = $this->upload_model->getNamaHafalan();
        $data['nama_kelas'] = 'A';

        $this->load->view('guru/showNamaA', $data);
    }

    public function showNamaB()
    {
        $data['uploads'] = $this->upload_model->getNamaByKelas('B');
        $data['nama_hafalan'] = $this->upload_model->getNamaHafalan();
        $data['nama_kelas'] = 'B';

        $this->load->view('guru/showNamaB', $data);
    }

    public function showNamaC()
    {
        $data['uploads'] = $this->upload_model->getNamaByKelas('C');
        $data['nama_hafalan'] = $this->upload_model->getNamaHafalan();
        $data['nama_kelas'] = 'C';

        $this->load->view('guru/showNamaC', $data);
    }
	public function tambahKomentar() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id_siswa = $this->session->userdata('id_siswa');
			$komen = $this->input->post('komen');
	
			// Verifikasi bahwa nilai $id_siswa ada dan $komen tidak kosong
			if ($id_siswa !== null && $id_siswa !== '' && !empty($komen)) {
				$uploadsData = $this->db->get_where('uploads', ['id_siswa' => $id_siswa])->row_array();
				$this->session->set_userdata('id_siswa', $id_siswa); // Simpan ID pengguna ke dalam session
	
				if (!empty($uploadsData)) {
					$dataKomentar = array(
						'id_siswa' => $uploadsData['id_siswa'],
						'nama' => $uploadsData['nama'],
						'email' => $uploadsData['email'],
						'kelas' => $uploadsData['kelas'],
						'nama_hafalan' => $uploadsData['nama_hafalan'],
						'komen' => $komen,
					);
					$this->load->model('Komentar_model');
					$this->Komentar_model->simpanKomentar($dataKomentar);
	
					// Set pesan flash untuk menampilkan pesan di halaman selanjutnya
					$this->session->set_flashdata('success-reg', 'Komentar berhasil dikirim.');
	
					// Ambil kelas dan nama sesi dari $uploadsData
					$kelas = strtolower($uploadsData['kelas']);
					$nama_sesi = strtolower(str_replace(' ', '%20', $uploadsData['nama']));
	
					// Redirect ke halaman showVideo yang sesuai dengan kelas dan nama sesi
					redirect("http://localhost/learnify/guru/showVideo{$kelas}/{$nama_sesi}");
				} else {
					echo "Gagal menambahkan komentar. Data siswa tidak ditemukan.";
				}
			} else {
				echo "Gagal menambahkan komentar. Data siswa atau kolom yang diperlukan kosong.";
			}
		}
	}
    public function halaman_video()
    {
        $kelas = '*';
        $id = '*';
		$kelas ='*';
		$nama_hafalan ='*';
		$nama ='*';
		$email='*';

        $videoDetail = $this->video_model->getVideoDetail($id, $kelas, $nama_hafalan, $nama, $email);

        if ($videoDetail) {
            echo "Video Title: " . $videoDetail->nama_hafalan;
        } else {
            echo "Video not found!";
        }
    }
	public function getVideoDetails($nama, $kelas, $nama_hafalan, $email) {
		// Mengambil informasi video berdasarkan ID video
		$id = $this->input->post('id');
	
		// Panggil model untuk mendapatkan detail video
		$this->load->model('Video_model');
		$video_detail = $this->Video_model->getVideoDetail($id, $kelas, $nama_hafalan, $nama, $email);
	
		return $video_detail;
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
