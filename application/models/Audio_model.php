<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AudioModel extends CI_Model {

  public function getAudioFile($filename) {
    $audio_path = FCPATH . 'assets/audio/' . $filename;

    if (file_exists($audio_path)) {
      return $audio_path;
    } else {
      return false;
    }
  }

}
