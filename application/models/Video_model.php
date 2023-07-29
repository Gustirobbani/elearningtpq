<?php
class Video_model extends CI_Model {
    public function getVideoDetail($kelas, $nama_hafalan, $nama, $email) {
        $this->db->select('*');
        $this->db->from('uploads');
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_hafalan', $nama_hafalan);
        $this->db->where('nama', $nama);
        $this->db->where('email', $email);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan objek video dengan detailnya
        } else {
            return null; // Video tidak ditemukan, kembalikan null
        }
    }

    public function getNamaByKelas($kelas)
    {
        $this->db->distinct();
        $this->db->select('nama');
        $this->db->where('kelas', $kelas);
        $query = $this->db->get('uploads');
        
        return $query->result_array(); // Mengembalikan array hasil query, jika tidak ada data, akan mengembalikan array kosong
    }

    public function getVideoByNama($nama)
    {
        $this->db->where('nama', $nama);
        $query = $this->db->get('uploads');
        return $query->row_array(); // Mengembalikan baris hasil query sebagai array
    }

    public function getKomentarByNama($nama)
    {
        $this->db->where('nama', $nama);
        $query = $this->db->get('komentar');
        return $query->result_array(); // Mengembalikan array hasil query
    }

    public function simpanKomentar($video_id, $komentar)
    {
        $data = array(
            'video_id' => $video_id,
            'komentar' => $komentar
        );
        $this->db->insert('komentar', $data);
    }
}
