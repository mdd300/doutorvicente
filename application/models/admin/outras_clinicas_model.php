<?php
class outras_clinicas_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_outras_clinicas($id = false) {

        $this->db->select('*');
        $this->db->from('outras_clinicas');

        $result = false;

        if($id){
            $this->db->where("id", $id);
            $result = $this->db->get()->row();
        }else{
            $result = $this->db->get()->result();
        }
        
        return $result;
    }

    function atualizar($data, $dataWhere) {
        $this->db->trans_start();

        $data['data_publicacao'] = date('Y-m-d H:i:s');

        $this->db->update('outras_clinicas', $data, $dataWhere);

        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
}

?>