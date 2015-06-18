<?php

class Delegacao_Model extends CI_Model
{

    public function delegacao($id)
    {
        $this->db->where('delegacao_idusuario', $id);

        if ($this->db->get('delegacao')->row()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function buscarDelegacaoPorIdUsuario($id){
    	$this->db->where('delegacao_idusuario', $id);
        return $this->db->get('delegacao')->row();
    }

    public function buscarDelegacaoPorId($id){
        $this->db->where('iddelegacao', $id);
        return $this->db->get('delegacao')->row();
    }

    public function buscarDelegacoes(){
        return $this->db->get('delegacao')->result();
    }

    public function buscarDelegacoesPagantes(){
        return $this->db->query("select * from usuario,delegacao where situacao_pagamento = 1 AND idusuario = delegacao_idusuario")->result();
    }

    public function buscarTodosDadosDelegacaoPorId($id){
        $id = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $id);
        return $this->db->query("select * from usuario,delegacao where iddelegacao =".$id."  AND idusuario = delegacao_idusuario")->result();
    }
}