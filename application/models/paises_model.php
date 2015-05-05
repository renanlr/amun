<?php

class Paises_Model extends CI_Model {

    public function buscarPaises(){
        return $this->db->get('paises')->result();
    }

    public function buscarPaisPorId($id){
    	$this->db->where('idpaises', $id);
        return $this->db->get('paises')->row();
    }

    public function inserirOpcaoDePaises($data){
    	$this->db->insert('paises_opcoes',$data);
    }

    public function buscarOpcoesDePaisesCadastrados($id){
    	$this->db->where('delegacao_iddelegacao', $id);
        return $this->db->get('paises_opcoes')->result();
    }
}