<?php
class Comments_model extends CI_Model {
    public function addComment($data) {
        $this->db->insert('comments', $data);
    }
}

