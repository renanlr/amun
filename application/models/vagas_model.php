<?php

class Vagas_Model extends CI_Model {

    public function vagas(){
    	$this->db->where('id', 1);
        return $this->db->get('qtd_vagas');
    }
}