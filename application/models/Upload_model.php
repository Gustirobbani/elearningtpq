<?php
class Upload_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function save_file($id_siswa, $nama, $email, $nama_hafalan, $kelas, $file_name) {
        // Data untuk disimpan dalam database
        $data = array(
            'id_siswa' => $id_siswa,
            'nama' => $nama,
            'email' => $email,
            'nama_hafalan' => $nama_hafalan,
            'kelas' => $kelas,
            'file_name' => $file_name
            // tambahkan kolom lainnya sesuai kebutuhan
        );
        $this->db->insert('uploads', $data);
		 // Mendapatkan semua data yang telah diinsert
		 $inserted_data = $this->db->get_where('uploads', array('id' => $this->db->insert_id()))->row_array();

		 return $inserted_data;
    }
	public function getAllDataByNama($nama)
{
    $this->db->where('nama', $nama,);
    $query = $this->db->get('uploads');
    return $query->result_array();
}

	public function getIdSiswaByFileName($file_name)
    {
        $this->db->select('id_siswa');
        $this->db->where('file_name', $file_name);
        $query = $this->db->get('uploads');
        $row = $query->row();
        return $row->id_siswa;
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->id_siswa;
		}
		return null; // atau nilai default yang sesuai jika data tidak ditemukan
	}
    
    public function getUserByEmail($email) {
        $query = $this->db->get_where('uploads', ['email' => $email]);
        return $query->row_array();
    }
    
    public function getNamaSiswa($kelas) {
        return $this->db->get_where('siswa', ['kelas' => $kelas])->result_array();
    }

    public function tampil_data() {
        return $this->db->get('uploads')->result();
    }

    public function getNamaByKelas($kelas)
    {
        $this->db->select('nama');
        $this->db->distinct();
        $this->db->from('uploads');
        $this->db->where('kelas', $kelas);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Jika tidak ada data yang ditemukan, kembalikan array kosong
        }
    }
    public function getNamaHafalan()
    {
        $this->db->select('nama_hafalan');
        $query = $this->db->get('uploads');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama_hafalan;
        }
        return '';
    }
	public function getUploadDataByFileName($file_name)
	{
		$this->db->where('file_name', $file_name);
		return $this->db->get('uploads')->row_array();
	}	
	public function get_file($video_id) {
		$this->db->select('email, kelas, nama_hafalan, id_siswa');
		$query = $this->db->get_where('uploads', array('id_siswa' => $video_id));
		return $query->row_array();
	}
}
