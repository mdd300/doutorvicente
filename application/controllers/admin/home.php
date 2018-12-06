<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('admin/login_model');
        $this->login_model->check_auth();
    }

    function index() {
        $data['title'] = 'Embryo Fetus - Painel de Controle';
        $this->load->view('admin/home/index', $data);
    }

}

?>