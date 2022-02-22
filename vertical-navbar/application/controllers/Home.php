<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'CI 3 - Mazer Admin Dashboard';
        $data['content'] = 'home';
        $this->load->view('template/layout/base', $data);
    }
}

/* End of file Home.php and path \application\controllers\Home.php */
