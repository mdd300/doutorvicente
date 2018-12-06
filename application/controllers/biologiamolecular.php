<?php

class biologiamolecular extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
    }

    function index() {
        show_404();
        $data['remover_tratamento'] = true;
        $data["title"] = "Embryo Fetus - Reproduчуo Humana Medicina Fetal";
        $this->load->view('site/biologiamolecular', $data);
    }
}
?>