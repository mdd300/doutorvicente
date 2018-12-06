<?php

class usuarios extends CI_Controller {

    function usuarios() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
        
        $this->load->model('admin/usuarios_model');
        
        $this->load->model('admin/login_model');
        $this->login_model->check_auth();
    }

    function index() {
        $data['usuarios'] = $this->usuarios_model->lista_usuarios();
        $this->load->view('admin/usuarios/lista_usuarios_view', $data);
    }

    function cria_usuario() {
        $data['title'] = 'Usuários';
        $this->load->view('admin/usuarios/cria_usuario_view', $data);
    }

    function insere_usuario() {
        $dados = $_POST;
        $dados["email"] = $_POST["usuario_email"];
        $dados["usuario"] = $_POST["usuario_login"];
        $dados["senha"] = sha1($_POST["senha"]);
        unset($dados["usuario_email"]);
        unset($dados["usuario_login"]);
        
        $usuarioID = $this->usuarios_model->set_usuario($dados);
        
        
        /*
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);
        $site = 'Gadbrivia';
        $nome_de = 'Gerenciador Belliz';
        $de_email = 'gerenciador@belliz.com.br';
        $this->email->from($de_email, $nome_de);
        $this->email->to($this->input->post('usuario_email'));
        $this->email->subject('Olá ' . $this->input->post('usuario_nome') . ' Você foi registrado para gerenciar o site ' . $site);
        $mensagem = "Dados para acessar o sistema no endereço " . base_url() . "<br><br><br>
					Usuário: " . $this->input->post('usuario_login') . "<br><br>
					Senha: " . $this->input->post('usuario_senha') . "<br><br><br>
					Quaquer dúvida contate o administrador do sistema.";

        $this->email->message($mensagem);
        $this->email->send();
        */
        
        $this->session->set_flashdata('messages', 'Usuário inserido com sucesso');
        redirect('admin/usuarios', 'location');
    }

    function deleta_item($usuarioID) {
        redirect("admin/usuarios/remove_item/".$usuarioID);
    }

    function remove_item($usuario_id) {
        if ($usuario_id) {

            $this->usuarios_model->deleta_usuario($usuario_id);

            $this->session->set_flashdata('messages', 'Usuário removido com sucesso.');

            redirect('admin/usuarios', 'location');
        } else {
            $this->session->set_flashdata('errors', 'Falha na remoção do usuário.');
            redirect('admin/usuarios', 'location');
        }
    }

    function set_visivel() {
        if ($this->input->post('usuarioID') != '' && $this->input->post('visivel') != '') {
            $this->usuarios_model->set_visivel($this->input->post('usuarioID'), $this->input->post('visivel'));

            echo $dados['visivel'] = $this->input->post('visivel');
            echo $dados['usuarioID'] = $this->input->post('usuarioID');
            

        } else {
            $this->session->set_flashdata('resposta', 5);
        }
    }

    function edita_usuario() {
        $usuario_id = $this->uri->segment(4);

        $data['usuario'] = $this->usuarios_model->get_dados_usuario($usuario_id);
        $data['title'] = 'Usuários - ' . $data['usuario']->nome;

        $this->load->view('admin/usuarios/edita_usuario_view', $data);
    }

    function atualiza_usuario() {
        $usuarioID = $this->input->post('usuarioID');
        $dadosWhere['usuarioID'] = $usuarioID;

        $dados = $_POST;
        unset($dados["usuarioID"]);

        if (@$this->input->post('senha')) {
            $dados['senha'] = sha1($this->input->post('senha'));
        }

        $this->usuarios_model->atualiza_usuario($dados, $dadosWhere);
        $this->session->set_flashdata('messages', 'Usuário atualizado com sucesso.');

        redirect('admin/usuarios', 'location');
    }

    function verifica_usuario_login() {
        $usuario_id = $this->input->post("usuario_id");
        $dados['usuario_login'] = $this->input->post("usuario_login");

        $usuario = $this->usuarios_model->busca_usuario_login($dados['usuario_login']);

        if ($usuario) {

            if ($usuario->usuario_id == $usuario_id) {
                $dados['resposta'] = 0;
            } else {
                $dados['resposta'] = 1;
            }
        } else {
            $dados['resposta'] = 0;
        }

        $this->load->view('admin/usuarios/ajax/verifica_login_view', $dados);
    }

    function verifica_login() {
        if ($this->input->post('usuario_login')) {
            $dados['resposta'] = $this->usuarios_model->verifica_login($this->input->post('usuario_login'));
            $dados['usuario_login'] = $this->input->post('usuario_login');
        } else {
            $dados['resposta'] = 2;
            $dados['usuario_login'] = $this->input->post('usuario_login');
        }
        $this->load->view('admin/usuarios/ajax/verifica_login_view', $dados);
    }

    function verifica_email() {
        if ($this->input->post('usuario_email')) {
            $dados['resposta'] = $this->usuarios_model->verifica_email($this->input->post('usuario_email'));
            $dados['usuario_email'] = $this->input->post('usuario_email');
        } else {
            $dados['resposta'] = 2;
            $dados['usuario_email'] = $this->input->post('usuario_email');
        }
        $this->load->view('admin/usuarios/ajax/verifica_email_view', $dados);
    }

}

?>