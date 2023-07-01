<?php

class M_materi extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('materi');
    }

    public function belajar($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }

    public function detail_materi($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }

    public function delete_materi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function bacaan_sholat_a()
    {
        $mapel = 'Bacaan Sholat';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function bacaan_sholat_b()
    {
        $mapel = 'Bacaan Sholat';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function risalatul_awal_c()
    {
        $mapel = 'Risalatul Awal';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function doa_harian_a()
    {
        $mapel = 'Doa Harian';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function aqidah_ahlak_b()
    {
        $mapel = 'Aqidah Ahlak';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function aqidah_ahlak_c()
    {
        $mapel = 'Aqidah Ahlak';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ilmu_tajwid_a()
    {
        $mapel = 'Ilmu Tajwid';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ilmu_tajwid_b()
    {
        $mapel = 'Ilmu Tajwid';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ilmu_tajwid_c()
    {
        $mapel = 'Ilmu Tajwid';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function surah_pendek_a()
    {
        $mapel = 'Surah Pendek';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function surah_pendek_b()
    {
        $mapel = 'Surah Pendek';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function surah_pendek_c()
    {
        $mapel = 'Surah Pendek';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function hafalan_a()
    {
        $mapel = 'Hafalan';
        $kelas = 'A';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function hafalan_b()
    {
        $mapel = 'Hafalan';
        $kelas = 'B';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function hafalan_c()
    {
        $mapel = 'Hafalan';
        $kelas = 'C';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
}
