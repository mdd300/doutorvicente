<?php

class aclinica extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('utility_helper');    
    }

    public function index()
    {
        
        $data['remover_tratamento'] = true;
        
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        
        $this->load->view('site/aclinica', $data);
    }

}

?>