<?php

class M_guru extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('guru');
    }
	public function komentar()
    {
        return $this->db->get('komentar');
    }
	public function detail_komentar($nip = null)
    {
        $query = $this->db->get_where('komentar', array('kelas' => $kelas))->row();
        return $query;
    }
	public function tambahKomentar($dataKomentar) {
        // Simpan data komentar ke dalam tabel 'komentar'
        return $this->db->insert('komentar', $dataKomentar);
    }
	public function getNipByNamaGuru($nama_guru)
    {
        $this->db->select('nip');
        $this->db->where('nama_guru', $nama_guru); // Mengubah 'nama' menjadi 'nama_guru'
        $query = $this->db->get('guru');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nip;
        } else {
            return null;
        }
    }
    
    public function detail_guru($nip = null)
    {
        $query = $this->db->get_where('guru', array('nip' => $nip))->row();
        return $query;
    }
	public function email($email = null)
    {
        $query = $this->db->get_where('guru', array('email' => $email))->row();
        return $query;
    }

    public function delete_guru($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_guru($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	public function get_kelas() {
		return $this->db->get('kelas')->result_array();
	}
	
}
