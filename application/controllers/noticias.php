<?php

class noticias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        
        $this->load->model('admin/noticias_model');
        
    }

    function index(){
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        $data["noticias"] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="", $dontGetThisID = "");
        // echo "<pre>";
        // var_dump($data["noticias"]);
        // exit;

        
        
        $this->load->view('site/noticias', $data);
    }

    function load($noticiaID){
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        
        $noticia = $this->noticias_model->get_noticia($noticiaID);
        $data['noticia'] = $noticia;

        
        

        
        
        $this->load->view('site/noticia', $data);
    }

}

?>