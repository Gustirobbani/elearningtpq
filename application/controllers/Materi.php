<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    private $list_materi = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('disqus');
        $this->load->model('m_materi');
        $this->list_materi['bacaan_sholat_a'] = $this->m_materi->bacaan_sholat_a()->result();
        $this->list_materi['bacaan_sholat_b'] = $this->m_materi->bacaan_sholat_b()->result();
        $this->list_materi['risalatul_awal_c'] = $this->m_materi->risalatul_awal_c()->result();
        $this->list_materi['doa_harian_a'] = $this->m_materi->doa_harian_a()->result();
        $this->list_materi['aqidah_ahlak_b'] = $this->m_materi->aqidah_ahlak_b()->result();
        $this->list_materi['aqidah_ahlak_c'] = $this->m_materi->aqidah_ahlak_c()->result();
        $this->list_materi['ilmu_tajwid_a'] = $this->m_materi->ilmu_tajwid_a()->result();
        $this->list_materi['ilmu_tajwid_b'] = $this->m_materi->ilmu_tajwid_b()->result();
        $this->list_materi['ilmu_tajwid_c'] = $this->m_materi->ilmu_tajwid_c()->result();
        $this->list_materi['surah_pendek_a'] = $this->m_materi->surah_pendek_a()->result();
        $this->list_materi['surah_pendek_b'] = $this->m_materi->surah_pendek_b()->result();
        $this->list_materi['surah_pendek_c'] = $this->m_materi->surah_pendek_c()->result();
        $this->list_materi['hafalan_a'] = $this->m_materi->hafalan_a()->result();
        $this->list_materi['hafalan_b'] = $this->m_materi->hafalan_b()->result();
        $this->list_materi['hafalan_c'] = $this->m_materi->hafalan_c()->result();
		
    }

	public function generateMateri($materi)
	{
		if (array_key_exists($materi, $this->list_materi)) {
			$data['materi'] = $this->list_materi[$materi];
		} else {
			// Jika indeks tidak ditemukan, berikan nilai default atau tindakan yang sesuai
			$data['materi'] = array(); // Nilai default, atau tindakan lain yang sesuai
		}
	
		$data['user'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
		// Mengambil data komentar dari tabel komentar
		$data['komentar'] = $this->m_materi->getKolomKomentar();
		// Menambahkan data pengguna ke dalam array komentar
		foreach ($data['komentar'] as &$k) {
			if ($k->nama === $data['user']['nama']) {
				$k->isCurrentUser = true;
			} else {
				$k->isCurrentUser = false;
			}
		}
		$this->load->view('materi/' . str_replace('_', '-', $materi), $data);
		$this->load->view('template/footer');
	}
    public function belajar($id)
    {
        $where = array('id' => $id);
        $detail = $this->m_materi->belajar($id);
        $data['detail'] = $detail;
        $data['disqus'] = $this->disqus->get_html();
        $this->load->view('materi/belajar', $data);
    }

    public function bacaan_sholat_a()
    {
        $this->generateMateri('bacaan_sholat_a');
    }

    public function bacaan_sholat_b()
    {
        $this->generateMateri('bacaan_sholat_b');
    }

    public function risalatul_awal_c()
    {
        $this->generateMateri('risalatul_awal_c');
    }

    public function doa_harian_a()
    {
        $this->generateMateri('doa_harian_a');
    }

    public function aqidah_ahlak_b()
    {
        $this->generateMateri('aqidah_ahlak_b');
    }

    public function aqidah_ahlak_c()
    {
        $this->generateMateri('aqidah_ahlak_c');
    }

    public function ilmu_tajwid_a()
    {
        $this->generateMateri('ilmu_tajwid_a');
    }

    public function ilmu_tajwid_b()
    {
        $this->generateMateri('ilmu_tajwid_b');
    }

    public function ilmu_tajwid_c()
    {
        $this->generateMateri('ilmu_tajwid_c');
    }

    public function surah_pendek_a()
    {
        $this->generateMateri('surah_pendek_a');
    }

    public function surah_pendek_b()
    {
        $this->generateMateri('surah_pendek_b');
    }

    public function surah_pendek_c()
    {
        $this->generateMateri('surah_pendek_c');
    }

    public function hafalan_a()
    {
        $this->generateMateri('hafalan_a');
    }

    public function hafalan_b()
    {
        $this->generateMateri('hafalan_b');
    }

    public function hafalan_c()
    {
        $this->generateMateri('hafalan_c');
    }

    public function komentar_a()
    {
        $data['komentar'] = $this->m_materi->getKolomKomentar();
        $this->generateMateri('komentar_a');
    }

    public function komentar_b()
    {
        $data['komentar'] = $this->m_materi->getKolomKomentar();
        $this->generateMateri('komentar_b');
    }

    public function komentar_c()
    {
        $data['komentar'] = $this->m_materi->getKolomKomentar();
        $this->generateMateri('komentar_c');
    }
}
