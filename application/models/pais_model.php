<?php

class Pais_Model extends CI_Model {

    public function buscarPaises(){
        return $this->db->get('lista_paises');
    }
}