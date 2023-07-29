<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_hook {

    public function initialize_email_library() {
        $CI =& get_instance();
        $CI->load->library('email');
    }
}
