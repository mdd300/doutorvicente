<?php

class Banners extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('utility_helper');

        $this->load->model('admin/banners_model');
        $this->load->model('admin/login_model');
        $this->login_model->check_auth();
    }

    public function index() {
        //VERIFICA SE TEM OS PARÂMETRO PARA A BUSCA
        if ($this->input->post('status')) {
            $status = $this->input->post('status');
            $this->session->set_flashdata('status', $this->input->post('status'));
        } else {
            $status = $this->session->flashdata('status');
            $this->session->set_flashdata('status', $status);
        }
        $data["banners"] = $this->banners_model->get_banners($status);

        $this->load->view('admin/banners/lista', $data);
    }

    public function cria() {
        $data['title'] = 'Banners - Insere';
        $this->load->view('admin/banners/cria', $data);
    }

    function salvar() {
        $data = $_POST;
        $data['usuario'] = $this->session->userdata('usuario_id');
        $data['sort'] = $this->banners_model->get_sort();
        $data['status'] = $this->input->post("status");
        $data['link'] = $this->input->post("link");


        $img_nome = $this->banners_model->upload_foto('imagem');

        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {
                $data['path'] = $img_nome;
            }
        }

        $this->db->insert('banners', $data);

        $this->session->set_flashdata('messages', 'Banner inserida com sucesso.');
        redirect('admin/banners', 'location');
    }

    public function editar($bannerID = false) {
        if (!$bannerID) {
            redirect('admin/banners', 'location');
        }

        $data['title'] = 'Banners - Editar';
        $data['banner'] = $this->banners_model->get_banner($bannerID);
        $this->load->view('admin/banners/edita', $data);
    }

    public function atualizar() {
        $data = $_POST;
        $dataWhere['bannerID'] = $this->input->post("bannerID");
        $bannerID = $this->input->post("bannerID");
        $link = $this->input->post("link");
        unset($data['bannerID']);

        $img_nome = $this->banners_model->upload_foto('imagem');

        if (!is_array($img_nome) && isset($img_nome)) {
            if (!is_array($img_nome)) {

                @$imagem = $this->banners_model->get_imagem_banner($bannerID);

                if (@$imagem) {
                    unlink('assets/uploads/noticias/' . $imagem);
                }

                $data['path'] = $img_nome;
            }
        }
        $data['link'] = $link;

        if ($this->banners_model->atualizar($data, $dataWhere)) {
            $this->session->set_flashdata('messages', 'Banner atualizado com sucesso.');
            redirect('admin/banners', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Não foi possível atualizar o banner. Tente novamente.');
            redirect('admin/banners', 'location');
        }
    }

    public function limpar() {
        $this->session->set_flashdata('status', '');

        redirect('admin/banners');
    }

    public function excluir_selecionados() {
        $ok = true;
        $erros = array();
        $ids = $this->input->post("ids");

        if (!$ids) {
            $this->session->set_flashdata('errors', 'Você deve selecionar pelo menos um registro para excluir');
            redirect('banners');
        }

        $banners = explode(';', $ids);

        for ($i = 0; $i <= count($banners) - 1; $i++) {

            $imagem = $this->banners_model->get_imagem_banner($banners[$i]);

            if ($imagem) {
                unlink('assets/uploads/banners/' . $imagem->path);
            }

            if (!$this->banners_model->excluir($banners[$i])) {
                $ok = false;
                $erros[] = $banners[$i];
            }
        }
        
        
        $result = mysql_query("SELECT * FROM banners") or die(mysql_error());
        $x = 1;
        while ($row = mysql_fetch_row($result)) {
            $bannerID = $row[0];
            mysql_query("UPDATE banners SET sort = '$x' WHERE bannerID = '$bannerID'") or die(mysql_error());
            $x++;
        }

        if ($ok) {
            $this->session->set_flashdata('messages', 'Banners excluidas com sucesso.');
        } else {
            $msg = '';
            for ($i = 0; $i <= count($erros) - 2; $i++) {
                $banner = $this->banner_model->get_banner($erros[$i]);
                if ($i < count($erros) - 2)
                    $msg .= $banner->titulo . ", ";
                else
                    $msg .= $banner->titulo . ".";
            }

            $this->session->set_flashdata('errors', 'Os seguintes banners não foram excluidas: ' . $msg);
        }
    }

    public function subir($bannerID, $sort) {
        $newSort = $sort + 1;
        $result = mysql_query("SELECT bannerID, sort FROM banners WHERE sort = '$newSort'") or die(mysql_error());
        $row = mysql_fetch_row($result);
        if (!$row) {
            redirect('admin/banners', 'location');
            exit;
        } else {
            $bannerIDrebaixado = $row[0];
            $sortRebaixado = $row[1] - 1;
            mysql_query("UPDATE banners SET sort = '$sortRebaixado' WHERE bannerID = '$bannerIDrebaixado'");
        }
        $sort = $sort + 1;
        mysql_query("UPDATE banners SET sort = '$sort' WHERE bannerID = '$bannerID'");
        redirect('admin/banners', 'location');
    }

    public function descer($bannerID, $sort) {
        $newSort = $sort - 1;
        $result = mysql_query("SELECT bannerID, sort FROM banners WHERE sort = '$newSort'") or die(mysql_error());
        $row = mysql_fetch_row($result);
        if (!$row) {
            redirect('admin/banners', 'location');
            exit;
        } else {
            $bannerIDelevado = $row[0];
            $sortElevado = $row[1] + 1;
            mysql_query("UPDATE banners SET sort = '$sortElevado' WHERE bannerID = '$bannerIDelevado'");
        }
        $sort = $sort - 1;
        mysql_query("UPDATE banners SET sort = '$sort' WHERE bannerID = '$bannerID'");
        redirect('admin/banners', 'location');
    }

}

?>