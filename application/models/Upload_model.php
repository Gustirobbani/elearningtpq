<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function save_file($data) {
        $this->db->insert('uploads', $data);
        return $this->db->insert_id();
    }
	public function tampil_data()
    {
        return $this->db->get('uploads');
    }
}

