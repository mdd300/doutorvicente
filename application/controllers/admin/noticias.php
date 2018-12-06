<?php
class Noticias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->helper('utility_helper');
        
        $this->load->model('admin/noticias_model');
        $this->load->model('admin/login_model');
        $this->login_model->check_auth();
    }

    public function index($offset = NULL) {
        //VERIFICA SE TEM OS PARÂMETRO PARA A BUSCA
        if ($this->input->post('texto')) {
            $texto = $this->input->post('texto');
            $this->session->set_flashdata('texto', $this->input->post('texto'));
        } else {
            $texto = $this->session->flashdata('texto');
            $this->session->set_flashdata('texto', $texto);
        }

        if ($this->input->post('status')) {
            $status = $this->input->post('status');
            $this->session->set_flashdata('status', $this->input->post('status'));
        } else {
            $status = $this->session->flashdata('status');
            $this->session->set_flashdata('status', $status);
        }

        if ($this->input->post('data_de')) {
            $data_de = $this->input->post('data_de');
            $this->session->set_flashdata('data_de', $this->input->post('data_de'));
        } else {
            $data_de = $this->session->flashdata('data_de');
            $this->session->set_flashdata('data_de', $data_de);
        }

        if ($this->input->post('data_ate')) {
            $data_ate = $this->input->post('data_ate');
            $this->session->set_flashdata('data_ate', $this->input->post('data_ate'));
        } else {
            $data_ate = $this->session->flashdata('data_ate');
            $this->session->set_flashdata('data_ate', $data_ate);
        }
        
        $data['noticias'] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="", $dontGetThisID = "");
     
        $this->load->view('admin/noticias/lista', $data);
    }

    public function cria() {
        $data['noticias'] = $this->noticias_model->get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="", $dontGetThisID = "");
        $this->load->view('admin/noticias/cria', $data);
    }

    function salvar() {
        $data = $_POST;
        $data['usuario'] = $this->session->userdata('usuario_id');
        $data['data_criacao'] = date('Y-m-d H:i:s');
        $data['data_alteracao'] = date('Y-m-d H:i:s');
        $data['data_publicacao'] = get_data_for_mysql_format($this->input->post('data_publicacao'));
        
        $img_nome = $this->noticias_model->upload_foto('imagem');
        
        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {
                $data['imagem'] = $img_nome;
            }
        }
        
        $this->db->insert('noticias', $data);
        //$novidadeID = $this->db->insert_id();
        
        $this->session->set_flashdata('messages', 'Novidade inserida com sucesso.');
        redirect('admin/noticias', 'location');
    }

    public function editar($noticiaID = false) {
        if (!$noticiaID){
            redirect('admin/noticias', 'location');
        }

        $data['noticia'] = $this->noticias_model->get_noticia($noticiaID);

        $this->load->view('admin/noticias/edita', $data);
    }

    public function atualizar() {
        $data = $_POST;
        $data['data_publicacao'] = get_data_for_mysql_format($this->input->post('data_publicacao'));

        $dataWhere['noticiaID'] = $this->input->post("noticiaID");
        $noticiaID = $this->input->post("noticiaID");
        unset($data['noticiaID']);

        $img_nome = $this->noticias_model->upload_foto('imagem');

        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {

                @$imagem = $this->noticias_model->get_imagem_noticia($noticiaID);

                if(@$imagem){
                    unlink('assets/uploads/noticias/'.$imagem);
                }

                $data['imagem'] = $img_nome;
            }
        }
        
        if ($this->noticias_model->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Novidade atualizada com sucesso.');
            redirect('admin/noticias', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar a novidade. Tente novamente.');
            redirect('admin/noticias', 'location');
        }
    }

    public function limpar()
    {
        $this->session->set_flashdata('texto','');
        $this->session->set_flashdata('data_de','');
        $this->session->set_flashdata('data_ate','');
        $this->session->set_flashdata('categoria','');
        $this->session->set_flashdata('marca','');
        $this->session->set_flashdata('status','');

        redirect('admin/noticias');
    }

    public function excluir_selecionados() {
        $ok = true;
        $erros = array();

        $ids = $this->input->post("ids");
        
        if(!$ids){
            $this->session->set_flashdata('errors', 'Você deve selecionar pelo menos um registro para excluir');
            redirect('noticias');
        }

        $noticias = explode(';', $ids);
        
        for ($i = 0; $i <= count($noticias) - 1; $i++) {
            
            $imagem = $this->noticias_model->get_imagem_noticia($noticias[$i]);

            /*
            if($imagem){
                @unlink('assets/uploads/noticias/'.$imagem);
            }
            
            @$arquivos = $this->noticias_model->get_arquivos_noticia($noticias[$i]);

            if(@$arquivos){
                foreach($arquivos as $row){
                    unlink(caminho_fisico().'uploads/noticias/'.$row->arquivo);
                }
            }
            */
            if (!$this->noticias_model->excluir($noticias[$i])) {
                $ok = false;
                $erros[] = $noticias[$i];
            } 
        }

        if ($ok) {
            $this->session->set_flashdata('messages', 'Novidades excluidas com sucesso.');
        } else {
            $msg = '';
            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $novidade = $this->noticias_model->get_novidade($erros[$i]);
                if ($i < count($erros) - 2)
                    $msg .= $novidade->titulo . ", ";
                else
                    $msg .= $novidade->titulo . ".";
            }

            $this->session->set_flashdata('errors', 'As seguintes noticias não foram excluidas: ' . $msg);
        }
    }

  
}

?>