<?php

class biopsiatesticular extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('utility_helper');
        
    }

    function index(){
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        $this->load->view('site/biopsiatesticular', $data);
    }

}

?>