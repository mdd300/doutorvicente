<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        
        $this->load->model('admin/banners_model');
        $this->load->model('admin/noticias_model');
        
    }

    function index(){
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        $data["banners"] = $this->banners_model->get_banners('a');
        $data["noticias"] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="2", $dontGetThisID = "");
        // $data["noticia_left"] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="1", $dontGetThisID = "");
        // $data["noticia_right"] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="1", $dontGetThisID = "");
        // echo "<pre>";
        // var_dump($data["noticias"]);
        // exit;

        
        
        $this->load->view('site/index', $data);
    }

}

?>