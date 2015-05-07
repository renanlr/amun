<?php

class Form_Model extends CI_Model {

   public function inserirFormIcty($data){
        $this->db->insert('individual_icty',$data);
    }

    public function inserirFormPa($data){
        $this->db->insert('individual_pa',$data);
    }

    public function inserirFormDelegacao($data){
        $this->db->insert('delegacao',$data);
    }

    public function decrementarQtdVagasDelegacao($qtd){
    	$this->db->where('id', 1);
        $vagas = $this->db->get('qtd_vagas')->row()->qtd_vagas_delegacao;
        $vagas = $vagas - $qtd;
        $dado = array('qtd_vagas_delegacao' => $vagas );
        $this->db->update('qtd_vagas', $dado);
    }

    public function retornaQtdVagas(){
    	$this->db->where('id', 1);
        return $this->db->get('qtd_vagas')->row();
    }

    public function retornaQtdVagasDelegacao(){
        $this->db->where('id', 1);
        return $this->db->get('qtd_vagas')->row()->qtd_vagas_delegacao;
    }

    public function decrementarQtdVagasPa($qtd){
        $this->db->where('id', 1);
        $vagas = $this->db->get('qtd_vagas')->row()->qtd_vagas_pa;
        $vagas = $vagas - $qtd;
        $dado = array('qtd_vagas_delegacao' => $vagas );
        $this->db->update('qtd_vagas', $dado);
    }

    public function decrementarQtdVagasIcty($qtd){
        $this->db->where('id', 1);
        $vagas = $this->db->get('qtd_vagas')->row()->qtd_vagas_icty;
        $vagas = $vagas - $qtd;
        $dado = array('qtd_vagas_delegacao' => $vagas );
        $this->db->update('qtd_vagas', $dado);
    }
}