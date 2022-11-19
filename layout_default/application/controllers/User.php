<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('name')) {
            redirect('auth/login');
        }
        $this->load->model('user_model', 'User');
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->User->select();
        $data['content'] = 'user/view';
        $this->load->view('template/layout/base', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Data User';
        $data['content'] = 'user/add';
        $this->load->view('template/layout/base', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Data User';
        $data['user'] = $this->User->select_by_id($id);
        $data['content'] = 'user/edit';
        $this->load->view('template/layout/base', $data);
    }

    public function create()
    {
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        $data = [
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
            "password" => $password,
        ];
        $create = $this->User->insert($data);

        // Cek Apakah berhasil atau tidak
        if ($create) {
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
            redirect('user');
        }

        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
        redirect('user/add');
    }

    public function update()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
        ];
        $update = $this->User->update($data, $this->input->post('id', true));

        // Cek Apakah berhasil atau tidak
        if ($update) {
            $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
            redirect('user');
        }

        $this->session->set_flashdata('gagal', 'Data gagal diubah!');
        redirect('user/add');
    }

    public function delete($id)
    {
        $this->User->delete($id);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!');
        redirect('user');
    }
}

/* End of file User.php and path \application\controllers\User.php */
