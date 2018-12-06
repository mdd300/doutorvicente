<?php
class Outras_clinicas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper('utility_helper');
        
        $this->load->model('admin/outras_clinicas_model');
        $this->load->model('admin/login_model');
        $this->login_model->check_auth();
    }

    public function index($offset = NULL) {
        $data['outras_clinicas'] = $this->outras_clinicas_model->get_outras_clinicas();
     
        $this->load->view('admin/outras_clinicas/lista', $data);
    }

    public function editar($id = false) {
        if (!$id){
            redirect('admin/outras_clinicas', 'location');
        }

        $data['outras_clinicas'] = $this->outras_clinicas_model->get_outras_clinicas($id);

        $data['outras_clinicas'] || show_404();

        $this->load->view('admin/outras_clinicas/edita', $data);
    }

    public function atualizar() {
        $data = $_POST;
        
        $dataWhere['id'] = $this->input->post("id");
        
        $id = $this->input->post("id");
        
        unset($data['id']);

        if ($this->outras_clinicas_model->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Registro atualizado com sucesso.');
            redirect('admin/outras_clinicas', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o registro. Tente novamente mais tarde.');
            redirect('admin/outras_clinicas', 'location');
        }
    }  
}

?>