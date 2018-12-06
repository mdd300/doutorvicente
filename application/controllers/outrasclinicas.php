<?php

class outrasclinicas extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('utility_helper');    
        $this->load->model('admin/outras_clinicas_model');    
    }

    public function index()
    {
        $data['remover_tratamento'] = true;
        
        $data["outras_clinicas"] = $this->outras_clinicas_model->get_outras_clinicas(1);
        
        $this->load->view('site/outras_clinicas', $data);
    }

}

?>