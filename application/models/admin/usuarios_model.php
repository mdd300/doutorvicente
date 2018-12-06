<?php

class usuarios_model extends CI_Model {

    function usuarios_model() {
        parent::__construct();
    }

    function numero_usuarios($offset = "") {
        if ($offset = '') {
            $offset = 0;
        }
        $this->db->select('*');
        $this->db->from('adm_usuarios');
        return $this->db->get()->num_rows();
    }

    function lista_usuarios($offset = NULL) {
        if ($offset == '') {
            $offset = 0;
        }

        $this->db->select('*');
        $this->db->from('adm_usuarios');
        $this->db->order_by('usuarioID', 'ASC');
        $this->db->limit(10, $offset);

        return $this->db->get()->result();
    }

    function get_usuario($id) {
        $this->db->select('*');
        $this->db->from('adm_usuarios');
        $this->db->where('usuarioID', $id);
        return $this->db->get()->row();
    }

    function set_usuario($dados) {
        $this->db->insert('adm_usuarios', $dados);
        return $this->db->insert_id();
    }

    function deleta_usuario($usuario_id) {
        $this->db->where('usuarioID', $usuario_id);
        $this->db->delete('adm_usuarios');
    }

    function get_dados_usuario($usuario_id) {
        $this->db->select('*');
        $this->db->from('adm_usuarios');
        $this->db->where('usuarioID', $usuario_id);

        return $this->db->get()->row();
    }

    function verifica_login($usuario_login) {
        $this->db->select('*');
        $this->db->from('adm_usuarios');
        $this->db->where('usuario', $usuario_login);

        return $this->db->get()->num_rows();
    }

    function verifica_email($usuario_email) {
        $this->db->select('*');
        $this->db->from('adm_usuarios');
        $this->db->where('email', $usuario_email);

        return $this->db->get()->num_rows();
    }

    function atualiza_usuario($dados, $dadosWhere) {
        $this->db->update('adm_usuarios', $dados, $dadosWhere);
    }

    function busca_usuario_login($usuario_login) {
        $this->db->select("*");
        $this->db->from("adm_usuarios");
        $this->db->where("login", $usuario_login);

        return $this->db->get()->row();
    }
    
}

?>