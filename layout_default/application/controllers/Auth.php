<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('name')) {
            redirect('home');
        }
        $this->load->model('auth_model', 'Auth');
    }

    public function login()
    {
        return $this->load->view('template/layout/login');
    }

    public function cek_login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $cekAdmin = $this->Auth->cek_admin($username);

        // Cek Apakah ada data admin
        if ($cekAdmin) {
            if (password_verify($password, $cekAdmin['password'])) {
                $sessionData = [
                    'name' => $cekAdmin['name'],
                    'role' => $cekAdmin['role']
                ];
                $this->session->set_userdata($sessionData);
                $this->session->set_flashdata('berhasil', 'Selamat Datang!');
                redirect('home');
            } else {
                $this->session->set_flashdata('gagal', 'Password atau Username yang anda masukkan salah!');
                redirect('auth/login');
            }
        } {
            $this->session->set_flashdata('gagal', 'Username anda tidak terdaftar!');
            redirect('auth/login');
        }
    }
}

/* End of file Auth.php and path \application\controllers\Auth.php */
