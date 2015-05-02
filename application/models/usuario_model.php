<?php

class Usuario_Model extends CI_Model {

    public function buscarUsuario($login, $senha){
        $this->db->where('email', $login);
        $this->db->where('senha', $senha);
        return $this->db->get('usuario')->row();
    }

    public function buscarEmail($email){
        $this->db->where('email', $email);
        return $this->db->get('usuario')->row();
    }

    public function buscarUsuarioPorId($id){
        $this->db->where('idusuario', $id);
        return $this->db->get('usuario')->row();
    }

    public function atualizarSenha($id, $senha){
        $this->db->where('idusuario', $id);
        $dado = array('senha' => $senha);
        $this->db->update('usuario', $dado);
    }

    public function verificarId($id){
        $this->db->where('idusuario',$id);
        return $this->db->get('usuario')->row();
    }

    public function inserirUsuario($data){
        $this->db->insert('usuario',$data);
    }

    public function atualizarStatus($id,$status)
    {
        if ($status == 2) {
            $query = $this->db->query("select qtd_vagas_icty from qtd_vagas where id = 1")->result();
            if ($query['0']->qtd_vagas_icty == 0) {
                return FALSE;
            } else {
                $this->db->where('idusuario', $id);
                $dado = array('status' => $status);
                $this->db->update('usuario', $dado);
                $this->db->where('id', 1);
                $qtd = $this->db->get('qtd_vagas')->row()->qtd_vagas_icty;
                $qtd = $qtd - 1;
                $vagas = array('qtd_vagas_icty' => $qtd);
                $this->db->update('qtd_vagas', $vagas);
                return TRUE;
            }
        }
        if ($status == 3) {
            $query = $this->db->query("select qtd_vagas_pa from qtd_vagas where id = 1")->result();
            if ($query['0']->qtd_vagas_pa == 0) {
                return FALSE;
            } else {
                $this->db->where('idusuario', $id);
                $dado = array('status' => $status);
                $this->db->update('usuario', $dado);
                $this->db->where('id', 1);
                $qtd = $this->db->get('qtd_vagas')->row()->qtd_vagas_pa;
                $qtd = $qtd - 1;
                $vagas = array('qtd_vagas_pa' => $qtd);
                $this->db->update('qtd_vagas', $vagas);
                return TRUE;
            }
        }
        if($status == 4){
            $this->db->where('idusuario', $id);
            $dado = array('status' => $status);
            $this->db->update('usuario', $dado);
        }
        if($status == 5){
            $this->db->where('idusuario', $id);
            $dado = array('status' => $status);
            $this->db->update('usuario', $dado);
        }
    }
    public function estrangeiro($id){
        $this->db->where('idusuario',$id);
        $qtd = $this->db->get('usuario')->row()->lista_paises_id;
        if($qtd!=32){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function verificaPagamento($id){
        $this->db->where('idusuario',$id);
        $situacao = $this->db->get('usuario')->row()->situacao_pagamento;
        if($situacao!=NULL){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function retornaValorInsFesta($id){
        $this->db->where('pa_idusuario',$id);
        if($this->db->get('individual_pa')->row()) {
            if ($this->db->get('individual_pa')->row()->social_events) {
                return 235;
            } else {
                return 150;
            }
        }
        $this->db->where('icty_idusuario',$id);
        if($this->db->get('individual_icty')->row()){
            if ($this->db->get('individual_icty')->row()->social_events) {
                return 260;
            } else {
                return 175;
            }
        }
        return FALSE;
    }

    public function delegacao($id){
        $this->db->where('delegacao_idusuario',$id);
        if($this->db->get('delegacao')->row()->delegacao_idusuario){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}