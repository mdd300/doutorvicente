<?php

class home_model extends Model
{
	function home_model()
	{
		parent::Model();
	}
	
	// HOME DO SITE
	function getNoticiasCapa() {
		$this->db->select("*");
		$this->db->select("DATE_FORMAT(data,'%d/%m/%Y') as data_item",false);
		$this->db->select("DATE_FORMAT(data,'%Y/%m/%d') as dia_semana",false);
		$this->db->from("site_noticias");
		$this->db->where('visivel',1);
		$this->db->orderby('data','DESC');
		$this->db->limit(10);
		
		return $this->db->get()->result();
	}
	
	function getPergunta() {
		$this->db->select("*");
		$this->db->from("site_perguntas");
		$this->db->where('visivel',1);
		$this->db->orderby("rand()");
				
		return $this->db->get()->row();
	}
	
	function getPerguntas() {
		$this->db->select("*");
		$this->db->from("site_perguntas");
		$this->db->where('visivel',1);
		$this->db->orderby('data','DESC');
				
		return $this->db->get()->result();
	}
	
	// HOME DA ADM

	function get_dados_secao($session_id)
	{
		$this->db->select('*');
		$this->db->from('ci_sessions');
		$this->db->where('session_id',$session_id);
		
		return $this->db->get()->row();
	}
	
	/*function getMenusFixos() {
		$this->db->select('*');
		$this->db->from('site_conteudos');
		$this->db->where('conteudo_secao !=',2);
		$this->db->where('conteudo_secao !=',4);
		$this->db->orderby('conteudo_nome','ASC');
		
		return $this->db->get()->result();
	}*/
	
	/*function getMenuProduto() {
		$this->db->select('*');
		$this->db->from('site_conteudos');
		$this->db->where('conteudo_secao',2);
		$this->db->where('conteudo_visivel',1);
		$this->db->orderby('conteudo_nome','ASC');
		
		return $this->db->get()->result();
	}*/
	
	/*function getSecao($id = null) {
		if (is_array($id)) {
			$current = array_shift($id);
			
			if (empty($id)) {
				return array($this->getSecao($current));
			} else {
				return array_merge(array($this->getSecao($current)), $this->getSecao($id));
			}
		}
	
		$this->db->select('*');
		$this->db->from('site_conteudos_secoes');
		$this->db->where('secao_id', $id);
		
		$secao = $this->db->get()->row();
		
		$this->db->select('*');
		$this->db->from('site_conteudos');
		$this->db->where('conteudo_secao', $secao->secao_id);
		$this->db->where('conteudo_visivel', 1);
		$this->db->orderby('conteudo_nome', 'ASC');
		
		$secao->conteudos = $this->db->get()->result();
		
		return $secao;
	}*/
	
	/*function getMenuSuporte() {
		$this->db->select('*');
		$this->db->from('site_conteudos');
		$this->db->where('conteudo_secao',4);
		$this->db->orderby('conteudo_nome','ASC');
		
		return $this->db->get()->result();
	}*/
	
	function diasemana($data)
	{
		$ano =  substr("$data", 0, 4);
		$mes =  substr("$data", 5, -3);
		$dia =  substr("$data", 8, 9);
		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano));
		
		switch($diasemana) {
			case"0": $diasemana = "Domingo";
			break;
			case"1": $diasemana = "Segunda-Feira";
			break;
			case"2": $diasemana = "Terça-Feira";
			break;
			case"3": $diasemana = "Quarta-Feira";
			break;
			case"4": $diasemana = "Quinta-Feira";
			break;
			case"5": $diasemana = "Sexta-Feira";
			break;
			case"6": $diasemana = "Sábado";
			break;
		}
		
		return $diasemana;
	}
	
	function get_dados_user($usuario_id)
	{
		$this->db->select('*');
		$this->db->from('site_adm_usuarios');
		$this->db->where('usuario_id',$usuario_id);
		
		return $this->db->get()->row();
	}
}

?>
