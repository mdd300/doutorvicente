<?php
class noticias_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function getCategorias(){
        return $this->db->select("*")->from("noticias_categorias")->get()->result();
    }
    
    function get_num_noticias($texto="", $status="", $data_de="", $data_ate=""){
        
        $this->db->select('n.titulo');
        $this->db->select('n.data_publicacao');
        $this->db->select('n.status');
        $this->db->from('noticias as n');
        
        if($texto != ''){
            $this->db->like('n.titulo',$texto);
            $this->db->or_like('n.resumo',$texto);
            $this->db->or_like('n.descricao',$texto);
        }

        if($status != ''){
            $this->db->where('n.status',$status);
        }
        
        if($data_de != ''){
            $this->db->where('n.data_publicacao >=',$data_de);
        }

        if($data_ate != ''){
            $this->db->where('n.data_publicacao <=',$data_ate);
        }
        
        return $this->db->get()->num_rows();
    }

    function get_noticias($offset = NULL, $texto="", $status="", $data_de="", $data_ate="", $limit="", $dontGetThisID = "") {

        if($offset=='') {
            $offset = 0;
        }

        $this->db->select('n.*');
        $this->db->from('noticias n');
                
        if($texto != ''){
            $this->db->like('n.titulo',$texto);
            $this->db->or_like('n.resumo',$texto);
            $this->db->or_like('n.descricao',$texto);
        }        

        if($status != ''){
            $this->db->where('n.status',$status);
        }

        if($data_de != ''){
            $d = get_data_for_mysql_format($data_de);
            $this->db->where('n.data_publicacao >=',$d);
        }

        if($data_ate != ''){
            $t = get_data_for_mysql_format($data_ate);
            $this->db->where('n.data_publicacao <=',$t);
        }
        $this->db->order_by('n.data_publicacao','DESC');
        
        if($dontGetThisID != ''){
            $this->db->where('n.noticiaID !=', $dontGetThisID);
        }
        
        if(!$limit){
            $this->db->limit(20,$offset);
        } else {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }
    
    function upload_foto($field) {
        $dir = realpath('assets/uploads/noticias');
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '200000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();

            $this->load->library('image_lib');

            $size = getimagesize($dados['full_path']);

            $config_img['image_library'] = 'GD2';
            $config_img['source_image'] = $dados['full_path'];
            $config_img['create_thumb'] = FALSE;
            $config_img['maintain_ratio'] = TRUE;
            $config_img['encrypt_name'] = TRUE;

            if($size[0] > $size[1]){
                $config_img['width'] = '1000';
                $config_img['height'] = $size[1];
            }else{
                $config_img['width'] = $size[0];
                $config_img['height'] = '1000';
            }
            
            $this->image_lib->initialize($config_img);
            $this->image_lib->resize();
           
            // Returns the photo name
            return $dados['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    function upload_arquivo($field) {
        $dir = realpath('assets/uploads/noticias');
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '20000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field_name = $field;

        if ($this->upload->do_upload($field_name)) {
            $dados = $this->upload->data();

            return $dados['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        }
    }

   function get_noticia($noticiaID) {

        $this->db->select("*");
        $this->db->from("noticias as n");
        $this->db->where("n.noticiaID", $noticiaID);

        $result = $this->db->get()->row();

        return $result;
    }

    function salvar($data) {
        $this->db->insert('noticias', $data);
        return TRUE;
    }

    function atualizar($data, $dataWhere) {
        $this->db->update('noticias', $data, $dataWhere);
        return true;
    }

    function excluir($id) {
        if ($this->db->delete('noticias', array('noticiaID' => $id)))
            return true;
        else
            return false;
    }

    function remove_arquivo($id) {
        if ($this->db->delete('noticias_arquivos', array('arquivoID' => $id)))
            return true;
        else
            return false;
    }

    function remove_link($id) {
        if ($this->db->delete('noticias_links', array('id_link' => $id)))
            return true;
        else
            return false;
    }

    function limpa_marcas_noticia($id_noticia)
    {
        if ($this->db->delete('noticias_has_marcas', array('noticia' => $id_noticia)))
            return true;
        else
            return false;
    }

    function get_marcas_noticias($id_noticia)
    {
        $this->db->select('n.*');
        $this->db->select('m.nome');
        $this->db->from('marcas as m');
        $this->db->join('noticias_has_marcas as n','n.marca = m.id_marca');
        $this->db->where('n.noticia',$id_noticia);

        $dados = $this->db->get()->result();

        return $dados;
    }

    function get_imagem_noticia($noticiaID)
    {
        $this->db->select('imagem');
        $this->db->from('noticias');
        $this->db->where('noticiaID',$noticiaID);

        $dados = $this->db->get()->row();

        return $dados->imagem;
    }

    function get_arquivos_noticia($noticiaID)
    {
        $this->db->select('arquivo');
        $this->db->from('noticias_arquivos');
        $this->db->where('noticiaID',$noticiaID);

        return $this->db->get()->result();
    }


    function get_links($id_noticia)
    {
        $this->db->select('*');
        $this->db->from('noticias_links');
        $this->db->where('noticia',$id_noticia);

        return $this->db->get()->result();
    }
    
	function get_tags($id_noticia)
    {
        $this->db->select('*');
        $this->db->from('noticias_tags');
        $this->db->where('noticia',$id_noticia);

        return $this->db->get()->result();
    }
    
	function add_tag($id_noticia, $arr_tags) {
		$this->db->delete('noticias_tags', array('noticia' => $id_noticia));

		foreach ($arr_tags as $tag) {
			$this->db->set('noticia', $id_noticia);
			$this->db->set('tag', $tag);
			$this->db->set('slug', UrlAmigavel($tag) );
			$this->db->insert('noticias_tags');
		}
		return $this->db->affected_rows();
	}

    function get_noticias_marcas($id_noticia,$id_marca)
    {
        $this->db->select('*');
        $this->db->from('noticias_has_marcas');
        $this->db->where('noticia',$id_noticia);
        $this->db->where('marca',$id_marca);

        $dados = $this->db->get()->row();

        return $dados->marca;
    }
    
    function get_noticia_marca($id_noticia)
    {
    	$this->db->select('*');
    	$this->db->from('noticias_has_marcas');
    	$this->db->where('noticia', $id_noticia);
    	
    	return $this->db->get()->result();
    }
    
	function get_marca_produtos($marca="") {

        $this->db->select('p.*');
        $this->db->select('l.nome as nome_linha');
        $this->db->select('m.nome as nome_marca');
        $this->db->select('f.nome as nome_familia');
        $this->db->from('marcas as m');
        $this->db->from('produtos_familias as f');
        $this->db->from('produtos_linhas as l');
        $this->db->join('produtos as p', 'p.marca = m.id_marca AND p.linha = l.id_linha AND p.familia = f.id_familia');

        if ($marca != '') {
            $this->db->where('p.marca',$marca);
        }

        $this->db->order_by('p.nome', 'ASC');

		return $this->db->get()->result();
       
    }
    
	function add_produtos($id_noticia, $prods){
		$this->db->delete('noticias_produtos', array('noticia' => $id_noticia));

		for($i = 0; $i < count($prods); $i++) {
			$this->db->set('noticia', $id_noticia);
			$this->db->set('produto', $prods[$i]);
			$this->db->insert('noticias_produtos');
		}
		return $this->db->affected_rows();
	}
	
	function get_noticia_produtos($id) {

        $this->db->select('*');
        $this->db->from('noticias_produtos');
        $this->db->where('noticia',$id);

		return $this->db->get()->result();
       
    }
    
    
}

?>