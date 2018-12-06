<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Transforma p em brbr
 *
 * @access	public
 * @param $string string
 * @return	string
 */
if (!function_exists('pToBr')) {

    function pToBr($string) {
        return str_replace('<p>', '', str_replace('</p>', '<br /><br />', $string));
    }

}

/**
 * Retorna o título, concatenando com o título padrão
 *
 * @access	public
 * @param   $titulo string
 * @return	string
 */
if (!function_exists('busca_config')) {

    function busca_config($id) {
        $CI = & get_instance();

        $CI->db->select('valor');
        $CI->db->from('configs');
        $CI->db->where('id_config', $id);

        $dados = $CI->db->get()->row();

        return $dados->valor;
    }

}

if (!function_exists('doubleToMoney')) {
    function doubleToMoney($value) {
        $value = (float) $value;
        return "R$".number_format($value, '2', ',', '.');
    }
}

if (!function_exists('moneyToDouble')) {
    function moneyToDouble($value) {
        $value = str_replace('R$','', $value);
        $value = str_replace('.','', $value);
        $value = str_replace(',','.', $value);
        return (DOUBLE)$value;
    }
}

setlocale(LC_MONETARY,"pt_BR", "ptb");
if (!function_exists('frmPreco')) {

    function frmPreco($preco) {
        return number_format($preco, '2', ',', '.');
    }

}

if (!function_exists('arrayToUrlSearch')) {

    function arrayToUrlSearch($array) {
        $url = array();

        foreach ($array as $key => $value) {
            if (!empty($value)) {
                $value = str_replace('/', '-', $value);
                $url[] = "$key/$value";
            }
        }

        return implode('/', $url);
    }

}

if (!function_exists('get_data_for_mysql_format')) {

    function get_data_for_mysql_format($date) {
        list($dia, $mes, $ano) = explode('/', $date);

        return "$ano-$mes-$dia";
    }

}

if (!function_exists('format_data_mysql')) {

    function format_data_mysql($date) {
        list($data, $hora) = explode(' ', $date);

        list($ano, $mes, $dia) = explode('-', $data);

        return "$dia/$mes/$ano";
    }

}

if (!function_exists('format_data_mysql_pipe')) {

    function format_data_mysql_pipe($date) {
        list($data, $hora) = explode(' ', $date);

        list($ano, $mes, $dia) = explode('-', $data);

        return "$dia | $mes | $ano";
    }

}


if (!function_exists('format_hora_mysql')) {

    function format_hora_mysql($date) {
        list($data, $hora) = explode(' ', $date);

        list($h, $min, $sec) = explode(':', $hora);

        return "$h:$min";
    }

}
/**
 * Funçao para formatar a data
 * entra AAAA/MM/DD HH:MM:SS e sai DD/MM/AAAA HH:MM:SS
 */
if (!function_exists('data_iso_to_pt')){

    function data_iso_to_pt($date){
        list($data, $hora) = explode ( ' ' , $date );
        $hora  = !empty($hora) ? $hora : date('H:i:s');
        $data = implode ('/',array_reverse(explode('-',$data))) . ' ' .$hora;

        return $data;
    }
}

/**
 * Funçao para formatar a data
 * entra DD/MM/AAAA HH:MM:SS e sai AAAA/MM/DD HH:MM:SS
 */
if (!function_exists('data_pt_to_iso')){

    function data_pt_to_iso($date){
        list($data, $hora) = explode ( ' ' , $date );
        $hora  = !empty($hora) ? $hora : date('H:i:s');
        $data = implode ('-',array_reverse(explode('/',$data))) . ' ' .$hora;

        return $data;
    }
}

/**
 * Retorna o html do banner
 */
if (!function_exists('htmlBanner')) {

    function htmlBanner($result) {
        if (count($result) == 0)
            return '';

        @$arquivo = explode(".", $result->arquivo);

        if ($result->width == 0)
            $width = '';
        else
            $width = 'width="' . $result->width . '"';

        if ($result->height == 0)
            $height = '';
        else
            $height = 'height="' . $result->height . '"';

        if (@$arquivo[1] == 'swf') {
            return "
			<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0' " . $width . " " . $height . " id='index' align='middle'>
			<param name='allowScriptAccess' value='sameDomain' />
			<param name='movie' value='" . base_url() . "uploads/banners/" . $result->arquivo . "' />
			<param name='quality' value='high' />
			<param name='bgcolor' value='#FFFFFF' />
			<param name='scale' value='noscale' />
			<param name='wmode' value='transparent' />
			<embed src='" . base_url() . "uploads/banners/" . $result->arquivo . "' FlashVars='' wmode='transparent' quality='high' bgcolor='#FFFFFF' " . $width . " " . $height . " name='index' align='top' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />
			</object>";
        } else {
            $html = '';

            $class = '';
            if ($result->key == 'home_topo2') {
                $class = 'class = "welcome"';
            } elseif ($result->key == 'sidebar')
                $class = 'class="banner-promocao"';

            if ($result->link)
                $html .= '<a href="' . $result->link . '" title="' . $result->titulo . '">';

            $html .= "<img $class src='" . base_url() . "uploads/banners/" . $result->arquivo . "' alt='" . $result->titulo . "' " . $width . " " . $height . " />";

            if ($result->link)
                $html .= '</a>';

            return $html;
        }
    }

}

if (!function_exists('pr')) {

    function pr($var, $exit = false) {
        if (is_string($var)) {
            $var = htmlentities($var);
        }
        echo "<pre>";
        print_r($var);
        echo "</pre>";

        if ($exit) {
            exit();
        }
    }

}

if (! function_exists('get_cidade')) {
    function get_cidade($cidade_id) {

        $CI =& get_instance();

        $CI->db->select('nome');
        $CI->db->from('cidades');
        $CI->db->where('id_cidade',$cidade_id);

        $dados = $CI->db->get()->row();

        if($dados){
            return $dados->nome;
        }else{
            return 'Não Informado';
        }
    }
}

if (! function_exists('get_estado')) {
    function get_estado($estado_id) {

        $CI =& get_instance();

        $CI->db->select('sigla');
        $CI->db->from('estados');
        $CI->db->where('id_estado',$estado_id);

        $dados = $CI->db->get()->row();

        if($dados){
            return $dados->sigla;
        }else{
            return 'Não Informado';
        }
    }
}


if (! function_exists('getShortURL')) {
    function getShortURL($url) {

        $CI =& get_instance();

        $CI->load->library('Http');
        Http::post('http://goo.gl/api/shorten', array(
             'url' => $url,
        ));
            
        $resp = json_decode(Http::result());
        
        return $resp->short_url;
    }
}

if (! function_exists('Debugar')){
	
	function Debugar($objeto, $stop = 0){	

		if(!empty($objeto)){
			echo '<pre>';
	        print_r($objeto);
	        echo "</pre>";
		} else {
			echo 'Empty!';
		}
		
        if($stop == 1){
        	die();	 		
        }
	}
}

if (! function_exists('UrlAmigavel')){
	/*
	function UrlAmigavel($text){
		$text = strtr($text, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
		//$clean = iconv('ISO-8859-1', 'UTF-8', $text);
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
		$clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
		$clean = strtolower(trim($clean, '_'));
		$clean = preg_replace("/[\/_| -]+/", '_', $clean);
	
		return $clean;	
	}
	*/
	setlocale(LC_ALL, 'en_US.UTF8');
	function UrlAmigavel($url, $trocar=array(), $limitador='_') {
		if( !empty($trocar) ) {
			$url = str_replace((array)$trocar, ' ', $url);
		}
	 
		$url_limpa = iconv('UTF-8', 'ASCII//TRANSLIT', $url);
		$url_limpa = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $url_limpa);
		$url_limpa = strtolower(trim($url_limpa, '_'));
		$url_limpa = preg_replace("/[\/_|+ -]+/", $limitador, $url_limpa);
	 
		return $url_limpa;
	}

}


if (! function_exists('MarcaURL')){

	function MarcaURL($marca) {		
		switch($marca){
			case '1':
				return 'belliz';	
			break;
			case '2':
				return 'enox';	
			break;
			case '3':
				return 'kess';	
			break;
			case '4':
				return 'ricca';	
			break;
			case '5':
				return 'vertix';	
			break;
		}
	}
}

