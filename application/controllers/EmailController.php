<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');

        // Load konfigurasi email dari file email.php
        $this->load->config('email');
    }
	public function send_email()
    {
// Contoh koneksi ke server SMTP
$smtp_host = 'ssl://smtp.example.com';
$smtp_port = 465;
$timeout = 30;

$smtp_connect = fsockopen($smtp_host, $smtp_port, $errno, $errstr, $timeout);
if (!$smtp_connect) {
    echo "Koneksi ke server SMTP gagal: $errno - $errstr";
    exit;
}

// Aktifkan SSL/TLS pada koneksi (Jika sudah diaktifkan di bagian sebelumnya, lewati langkah ini)
$ssl_crypto_method = STREAM_CRYPTO_METHOD_TLS_CLIENT;
if (!stream_socket_enable_crypto($smtp_connect, TRUE, $ssl_crypto_method)) {
    echo "Gagal mengaktifkan SSL/TLS pada koneksi";
    fclose($smtp_connect);
    exit;
}

// Kirim perintah HELO atau EHLO ke server SMTP
$smtp_response = fgets($smtp_connect);
echo $smtp_response; // Cetak respon dari server SMTP

// Kirim perintah MAIL FROM ke server SMTP
$smtp_command = 'MAIL FROM: <sender@example.com>' . "\r\n";
fputs($smtp_connect, $smtp_command);
$smtp_response = fgets($smtp_connect);
echo $smtp_response; // Cetak respon dari server SMTP

// Kirim perintah RCPT TO ke server SMTP
$smtp_command = 'RCPT TO: <recipient@example.com>' . "\r\n";
fputs($smtp_connect, $smtp_command);
$smtp_response = fgets($smtp_connect);
echo $smtp_response; // Cetak respon dari server SMTP

// Kirim perintah DATA ke server SMTP
$smtp_command = 'DATA' . "\r\n";
fputs($smtp_connect, $smtp_command);
$smtp_response = fgets($smtp_connect);
echo $smtp_response; // Cetak respon dari server SMTP

// Kirim email (berisi header dan body) ke server SMTP
$email_header = "Subject: Test Email\r\n";
$email_header .= "From: sender@example.com\r\n";
$email_header .= "To: recipient@example.com\r\n";
$email_body = "Ini adalah isi dari email.\r\n";
$email_body .= "Ini adalah baris kedua email.\r\n";
$email_body .= "\r\n.\r\n"; // Akhiri email dengan karakter baru, diikuti titik tunggal (menandakan akhir email)

fputs($smtp_connect, $email_header . $email_body);
$smtp_response = fgets($smtp_connect);
echo $smtp_response; // Cetak respon dari server SMTP

// Tutup koneksi ke server SMTP
$smtp_command = 'QUIT' . "\r\n";
fputs($smtp_connect, $smtp_command);
fclose($smtp_connect);

}
}
