<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Komentar_model extends CI_Model
{
        public function getKomentar($nama_hafalan, $kelas)
    {
        $this->db->where('nama_hafalan', $nama_hafalan);
        $this->db->where('kelas', $kelas);
        return $this->db->get('komentar')->result();
    }
	public function simpanKomentar($dataKomentar) {
        // Simpan data komentar ke dalam tabel 'komentar'
        return $this->db->insert('komentar', $dataKomentar);
    }
    public function komentar_a()
    {
        $komen = 'Komentar';
        $nama = 'Nama';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('komen', $komen);
        $this->db->where('nama', $nama);
        return $this->db->get('komentar')->result();
    }

    public function komentar_b()
    {
        $komen = 'Komentar';
        $nama = 'Nama';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('komen', $komen);
        $this->db->where('nama', $nama);
        return $this->db->get('komentar')->result();
    }

    public function komentar_c()
    {
        $komen = 'Komentar';
        $nama = 'Nama';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('komen', $komen);
        $this->db->where('nama', $nama);
        return $this->db->get('komentar')->result();
	}
	
}
