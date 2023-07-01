<?php
class Comments_model extends CI_Model {

    public function getComments($classId, $comment) {
        $data = array(
            'class_id' => $classId,
            'comment' => $comment
        );
        $this->db->insert('comments', $data);
    }

}
?>
