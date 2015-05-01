<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('criptografar')) {
	function criptografar($valor){
		$valor = strrev(base64_encode($valor));
		$valor = str_replace('=', '-', $valor);
		return $valor;
	}
}


if ( ! function_exists('descriptografar')) {
	function descriptografar($valor){
		$valor = str_replace('-', '=', $valor);
		return base64_decode(strrev($valor));
	}
}