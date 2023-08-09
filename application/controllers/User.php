<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
    	$this->load->model('m_siswa');
      //  $this->session->set_flashdata('not-login', 'Gagal!');
        //if (!$this->session->userdata('email')) {
        //redirect('welcome');
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

        $this->load->view('user/kelasC');
        $this->load->view('template/footer');
    }

    public function registration()
    {
        $this->load->view('user/registration');
        $this->load->view('template/footer');
    }

    public function registration_act()
{
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]|callback_check_alpha_only|callback_check_nama', [
        'required' => 'Harap isi kolom nama.',
        'min_length' => 'Nama terlalu pendek.',
        'check_alpha_only' => 'Kolom Nama hanya boleh diisi dengan huruf.',
        'check_nama' => 'Nama ini telah digunakan!'
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
		$this->form_validation->set_rules('kelas', 'Kelas', 'required', [
			'required' => 'Harap pilih kelas.',
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

          //  $token = base64_encode(random_bytes(32));
            //$user_token = [
            //'email' => $email,
            //'token' => $token,
            //'date_created' => time(),
           // ];

            $this->db->insert('siswa', $data);
            //$this->db->insert('token', $user_token);

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
	public function check_nama($nama)
{
    $this->db->where('nama', $nama);
    $query = $this->db->get('siswa');
    if ($query->num_rows() > 0) {
        return false;
    } else {
        return true;
    }
}
public function check_alpha_only($str)
{
    if (!preg_match('/^[a-zA-Z ]+$/', $str)) {
        $this->form_validation->set_message('check_alpha_only', 'Kolom {field} hanya boleh diisi dengan huruf.');
        return false;
    }
    return true;
}

}
	


