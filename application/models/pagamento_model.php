<?php

class Pagamento_Model extends CI_Model
{
    public  function  criarComprovante($id,$dados){
        $this->db->where('idusuario', $id);
        $this->db->update('usuario', $dados);
    }



}