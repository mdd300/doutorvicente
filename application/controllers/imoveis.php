<?php

class Imoveis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');

        $this->load->model('admin/imoveis_model');
        $this->load->model('admin/frases_model');
    }
    
    function load($imovelID){
        $data["imovel"] = $this->imoveis_model->get_imovel($imovelID);
        $data["frase"] = $this->frases_model->get_random_frase();
        $data["title"] = "Viver em Cobertura - Deixando Você nas Nuvens";
        $this->load->view("site/produtos", $data);
    }

}

?>