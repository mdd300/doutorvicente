<?php

class Contato extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->helper('utility_helper');
        $this->load->model('admin/contato_model');
    }

    public function index() 
    {
        $data["title"] = "Embryo Fetus - Reprodução Humana Medicina Fetal";
        
        $this->load->view('site/contato', $data);
    }

    public function send_contact()
    {

        $post = $this->input->post();

        $return = array('status' => false, 'message' => 'Ocorreu um erro no envio, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('message', 'Mensagem', 'trim|required');

            if($this->form_validation->run()){

                $origem = (isset($post['origem'])) ? $post['origem'] : 'Contato';

                if($this->contato_model->save_contact($post, $origem)){

                    $this->send_notifications($post, 'Contato');

                    $return = array('status' => true, 'message' => 'Mensagem enviada com sucesso!');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'message' => $errors[0]);
            }
        }

        echo json_encode($return);        
    }

    public function send_appointment()
    {
        $post = $this->input->post();

        $return = array('status' => false, 'class' => 'danger', 'message' => 'Ocorreu um erro no envio, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

            if($this->form_validation->run()){

                if($this->contato_model->save_contact($post, 'Consulta')){

                    $this->send_notifications($post,'Consulta');

                    $return = array('status' => true, 'class' => 'success', 'message' => 'Mensagem enviada com sucesso!');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'class' => 'warning', 'message' => $errors[0]);
            }
        }

        echo json_encode($return);
    }

    public function send_telephone()
    {
        $post = $this->input->post();

        $return = array('status' => false, 'class' => 'danger', 'message' => 'Ocorreu um erro no envio, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Nome', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('telephone', 'Telefone', 'trim|required');

            if($this->form_validation->run()){

                if($this->contato_model->save_contact($post, 'Contato Telefone')){

                    $this->send_notifications($post,'Contato Telefone');

                    $return = array('status' => true, 'class' => 'success', 'message' => 'Mensagem enviada com sucesso!');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'class' => 'warning', 'message' => $errors[0]);
            }
        }

        echo json_encode($return);
    }

    public function send_notifications($dados, $origem)
    {

        $mensagem = "Nome: " . $dados['name'] . "<br />";
        $mensagem .= "E-mail: " . $dados['email'] . "<br />";
        
        if(isset($dados['shift'])){
            $mensagem .= "Turno: " . $dados['shift'] . "<br />";
        }

        if(isset($dados['city'])){
            $mensagem .= "Cidade: " . $dados['city'] . "<br />";
        }
        
        if(isset($dados['telephone'])){
            $mensagem .= "Telefone: " . $dados['telephone'] . "<br />";
        }
        
        if(isset($dados['message'])){
            $mensagem .= "Mensagem: " . $dados['message'] . "<br />";
        }

        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        //authentication
        $config['protocol']    = 'smtp';
        $config['smtp_host']   = 'smtp.embryofetus.com.br';
        $config['smtp_user']   = 'contato@embryofetus.com.br';
        $config['smtp_pass']   = 'clinica583';
        $config['smtp_port']   = 587;
        $config['newline'] = "\r\n";
        // $config['smtp_crypto'] = 'ssl';

        $this->email->initialize($config);

        $this->email->from('contato@embryofetus.com.br', 'Embryo Fetus');
        $this->email->to('contato@embryofetus.com.br');
        $this->email->subject($origem." - Embryo Fetus");
        $this->email->message($mensagem);

        $this->email->send();

        $this->email->clear(TRUE);

        $this->email->from('contato@embryofetus.com.br', 'Dr. Vicente Ghilardi - Embryo Fetus Reprodução Humana');
        $this->email->to($dados['email']);
        $this->email->subject('Recebemos sua mensagem');

        $mensagem_cliente  = '<h3>' . $dados['name'] . ',</h3>';
        $mensagem_cliente .= '<p>';
        $mensagem_cliente .= 'Obrigado por entrar em contato com Dr. Vicente Ghilardi - Embryo Fetus Reprodução Humana.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Em breve entraremos em contato.';
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= 'Tel.: 55 11 3051-2313';    
        $mensagem_cliente .= '<br>';
        $mensagem_cliente .= '<a href="http://doutorvicente.com.br/">www.doutorvicente.com.br</a>';
        $mensagem_cliente .= '</p>';
        $mensagem_cliente .= '<img src="' . site_url('assets/images/header_logo.png') . '" alt="Dr. Vicente Ghilardi - Embryo Fetus Reprodução Humana">';

        $this->email->message($mensagem_cliente);
        $this->email->send();
    }

    public function newsletter()
    {
        $post = $this->input->post();
        
        $return = array('status' => false, 'class' => 'danger', 'message' => 'Ocorreu um erro no cadastro, tente novamente mais tarde.');

        if($post){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

            if($this->form_validation->run()){
                if($this->contato_model->save_newsletter($post)){
                    $return = array('status' => true, 'class' => 'success', 'message' => 'E-mail cadastrado com sucesso!');
                }else{
                    $return = array('status' => false, 'class' => 'warning', 'message' => 'E-mail já cadastrado.');
                }
            }else{
                $errors = array_values($this->form_validation->error_array());
                $return = array('status' => false, 'class' => 'warning', 'message' => $errors[0]);
            }
        }

        echo json_encode($return);
    }
}
?>
