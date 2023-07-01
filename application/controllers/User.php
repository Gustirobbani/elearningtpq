<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->library('email'); // Load library email untuk mengirim email konfirmasi
    	$this->load->model('m_siswa');
        // $this->session->set_flashdata('not-login', 'Gagal!');
        // if (!$this->session->userdata('email')) {
        //     redirect('welcome');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function kelasA()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasA');
        $this->load->view('template/footer');
    }

    public function kelasB()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasB');
        $this->load->view('template/footer');
    }

    public function kelasC()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelasB');
        $this->load->view('template/footer');
    }

    public function registration()
    {
        $this->load->view('user/registration');
        $this->load->view('template/footer');
    }

    public function registration_act()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|valid_nama|is_unique|min_length[5]|[siswa.nama]', [
            'is_unique' => 'Nama telah di gunakan',
			'required' => 'Harap isi kolom username.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[siswa.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/nav');
            $this->load->view('user/registration');
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
				'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time(),
            ];

            //siapkan token

            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time(),
            // ];

            $this->db->insert('siswa', $data);
            // $this->db->insert('token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('welcome'));
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ini email disini',
            'smtp_pass' => 'Isi Password gmail disini',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'syauqi',
            'link' => ' ' . base_url() . 'welcome/verify?email=' . $this->input->post('email') . '& token' . urlencode($token) . '"',
        );

        $this->email->from('LearnifyEducations@gmail.com', 'Learnify');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $link =
            $this->email->subject('Verifikasi Akun');
            $body = $this->load->view('template/email-template.php', $data, true);
            $this->email->message($body);
        } else {
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }
	
	public function lupa_password() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
		  // Validasi gagal, tampilkan kembali form dengan pesan error
		  $this->load->view('lupa_password');
		} else {
		  // Validasi berhasil, proses reset password
		  $email = $this->input->post('email');
		  $user = $this->m_siswa->email_detail($email); // Ganti dengan method Anda untuk mendapatkan user berdasarkan email
		  
		  if ($user) {
			// Generate token unik untuk reset password
			$token = bin2hex(random_bytes(20));
			
			// Simpan token dan email pengguna ke database (ganti dengan method Anda)
			$this->m_siswa->saveResetToken($user['id'], $token);
			
			// Konfigurasi email
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'gustirb133@gmail.com';
			$config['smtp_pass'] = 'gusti1234_';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			// Kirim email konfirmasi reset password
			$this->email->from('gustirb133@gmail.com', 'Gusti robbani');
			$this->email->to($email);
			$this->email->subject('Reset Password');
			$this->email->message('Silakan klik link berikut untuk mereset password Anda: ' . base_url('reset_password/' . $token));
			
			if ($this->email->send()) {
			  // Email berhasil dikirim, tampilkan pesan sukses
			  $data['message'] = 'Email konfirmasi reset password telah dikirim ke ' . $email;
			  $this->load->view('sukses_password', $data);
			} else {
			  // Email gagal dikirim, tampilkan pesan error
			  $data['message'] = 'Terjadi kesalahan saat mengirim email. Silakan coba lagi.';
			  $this->load->view('lupa_password', $data);
			}
		  } else {
			// User tidak ditemukan, tampilkan pesan error
			$data['message'] = 'Email tidak ditemukan.';
			$this->load->view('lupa_password', $data);
		  }
		}
	  }
	  public function reset_password()
	  {
		  // Memvalidasi input
		  $this->form_validation->set_rules('new_password', 'New Password', 'required');
		  $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
		  
		  if ($this->form_validation->run() == FALSE)
		  {
			  // Jika validasi gagal, tampilkan form reset password kembali dengan error
			  $data['user_id'] = $this->input->post('user_id');
			  $data['reset_token'] = $this->input->post('reset_token');
			  $this->load->view('reset_password copy', $data);
		  }
		  else
		  {
			  // Simpan password baru ke dalam database
			  $new_password = $this->input->post('new_password');
			  $user_id = $this->input->post('user_id');
			  
			  // Lakukan operasi penyimpanan password baru ke dalam database sesuai dengan kebutuhan aplikasi Anda
			  
			  // Tampilkan pesan sukses jika berhasil mereset password
			  echo "Password has been reset successfully!";
		  }
	  }
  
	}
	


