<?php

class Newsletters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('utility_helper');

        $this->load->model('admin/login_model');
        $this->login_model->check_auth();

        $this->load->model('admin/newsletters_model');
    }

    public function index() {

        $contatos = $this->newsletters_model->get_emails();

        $output = NULL;
        foreach ($contatos as $contato):
            $output.= $contato->email . ";" . $contato->data_criaco . "\n";
        endforeach;

        $filename = date("d-m-Y_H-i", time());
        
        
        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: csv" . date("Y-m-d") . ".csv");
        header("Content-disposition: filename=" . $filename . ".csv");         
        echo $output;
        exit;
    }

}

?>