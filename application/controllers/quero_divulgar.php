<?php

class Quero_divulgar extends CI_Controller {

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
        $data["title"] = "Viver em Cobertura - Deixando Você nas Nuvens";
        $data["frase"] = $this->frases_model->get_random_frase();
        $this->load->view('site/quero_divulgar', $data);
    }

    function save() {
        if ($_POST) {
            $data = $_POST;
            $data["valor_comprar"] = moneyToDouble($data["valor_comprar"]);
            $data["valor_alugar"] = moneyToDouble($data["valor_alugar"]);
            $data["valor_condominio"] = moneyToDouble($data["valor_condominio"]);
            $data["iptu"] = moneyToDouble($data["iptu"]);
            
            if($this->db->insert('imoveis_divulgar', $data)){
                echo json_encode(true);
                $this->sendNotification($data);
            } else {
                return false;
            }
        }
    }

    function sendNotification($data) {
        $html = "<h1>Existe um novo imóvel cadastrado no sistema: </h1><br /><br />";
        foreach ($data as $key => $value):
            $html .= "<b>" . $key . "</b>" . $value . "<br />";
        endforeach;
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);
        $site = 'Viver em Cobertura';
        $nome_de = 'Viver em Cobertura';
        $de_email = 'contato@viveremcobertura.com.br';
        $this->email->from($de_email, $nome_de);
        $this->email->to('renato@viveremcobertura.com.br');
        $this->email->subject("Novo Imóvel");
        $this->email->message($html);
        $this->email->send();
    }

}

?>