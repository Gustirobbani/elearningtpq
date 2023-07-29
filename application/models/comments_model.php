<?php
class comments_model extends CI_Model{
public function getComments($kelas)
{
    $this->db->where('kelas', $kelas);
    $query = $this->db->get('komentar');
    return $query->result();
}
}
