<?php

class Individual_Model extends CI_Model {

    public function buscarIndividualIcty(){
        return $this->db->query("select * from usuario,individual_icty where situacao_pagamento = 1 AND idusuario = icty_idusuario")->result();
    }

    public function buscarIndividualPress(){
        return $this->db->query("select * from usuario,individual_pa where situacao_pagamento = 1 AND idusuario = pa_idusuario")->result();
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

    public function definirRepresentacaoDePais($id,$data){
        $this->db->where('idpaises', $id);
        $this->db->update('paises',$data);
    }
}