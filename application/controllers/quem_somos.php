<?php

class quem_somos extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');

        $this->load->model('admin/banners_model');
        $this->load->model('admin/imoveis_model');
        $this->load->model('admin/frases_model');
    }

    function index() {
        $data["title"] = ":: Casas de Vila ::";
        $data["frase"] = $this->frases_model->get_random_frase();
        $this->load->view('site/quem_somos', $data);
    }

}

?>