<?php

class Buscar_imovel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');

        $this->load->model('admin/imoveis_model');
        $this->load->model('admin/frases_model');
    }

    function index() {
        $data["bairros"] = $this->imoveis_model->get_bairros();
        $data["frase"] = $this->frases_model->get_random_frase();
        $data["title"] = "Viver em Cobertura - Deixando Você nas Nuvens";
        $this->load->view('site/buscar_imovel', $data);
    }

    function find() {
        if ($this->input->post("comprar_ou_alugar") != '') {
            $comprar_ou_alugar = $this->input->post("comprar_ou_alugar");
            $bairro1 = $this->input->post("bairro1");
            $bairro2 = $this->input->post("bairro2");
            $bairro3 = $this->input->post("bairro3");
            $bairro4 = $this->input->post("bairro4");
            $valor = $this->input->post("valor");
            $valor_comprar = $this->input->post("valor_comprar");
            $valor_alugar = $this->input->post("valor_alugar");

            $this->session->set_userdata('comprar_ou_alugar', $comprar_ou_alugar);
            $this->session->set_userdata('bairro1', $bairro1);
            $this->session->set_userdata('bairro2', $bairro2);
            $this->session->set_userdata('bairro3', $bairro3);
            $this->session->set_userdata('bairro4', $bairro4);
            $this->session->set_userdata('valor', $valor);
            $this->session->set_userdata('valor_comprar', $valor_comprar);
            $this->session->set_userdata('valor_alugar', $valor_alugar);
        } else {
            $comprar_ou_alugar = $this->session->userdata('comprar_ou_alugar');
            $bairro1 = $this->session->userdata('bairro1');
            $bairro2 = $this->session->userdata('bairro2');
            $bairro3 = $this->session->userdata('bairro3');
            $bairro4 = $this->session->userdata('bairro4');
            $valor = $this->session->userdata('valor');
            $valor_comprar = $this->session->userdata('valor_comprar');
            $valor_alugar = $this->session->userdata('valor_alugar');
        }
              
        if(($valor_comprar) AND (!$valor_alugar)){
            $valor = $valor_comprar;
            $valor2 = NULL;
        } else if((!$valor_comprar) AND ($valor_alugar)){
            $valor = $valor_alugar;
            $valor2 = NULL;
        } else if((!$valor_comprar) AND (!$valor_alugar)){
            $valor = $valor;
            $valor2 = NULL;
        } else if(($valor_comprar) AND ($valor_alugar)){
            $valor = $valor_comprar;
            $valor2 = $valor_alugar;
        } else {
            $valor = $valor;
            $valor2 = NULL;
        }
  

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["imoveis"] = $this->imoveis_model->buscar_imoveis($comprar_ou_alugar, $bairro1, $bairro2, $bairro3, $bairro4, $valor, $valor2, $page, $limit = 4);
        $total_imoveis = count($this->imoveis_model->buscar_imoveis($comprar_ou_alugar, $bairro1, $bairro2, $bairro3, $bairro4, $valor, $valor2, $page, $limit = 4, true));

        $config = array();
        $config["base_url"] = base_url() . "buscar_imovel/find/";
        $config["total_rows"] = $total_imoveis;
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["title"] = "Viver em Cobertura - Deixando Você nas Nuvens";
        $data["frase"] = $this->frases_model->get_random_frase();
        $data["total_imoveis"] = $total_imoveis;
        $this->load->view('site/produtos', $data);
    }

    function all() {
        $data["imoveis"] = $this->imoveis_model->get_imoveis();
        $data["frase"] = $this->frases_model->get_random_frase();
        $this->load->view('site/produtos', $data);
    }

}

?>