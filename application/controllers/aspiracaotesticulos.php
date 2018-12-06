<?php

class aspiracaotesticulos extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
    }

    function index() {
        $data["title"] = "Embryo Fetus - Reproduчуo Humana Medicina Fetal";
        $this->load->view('site/aspiracaotesticulos', $data);
    }
}
?>