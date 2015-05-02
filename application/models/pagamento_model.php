<?php

class Pagamento_Model extends CI_Model
{
    public  function  criarComprovante($id,$dados){
        $this->db->where('idusuario', $id);
        if($this->db->update('usuario', $dados)){
            $this->session->set_userdata('mensagem', 'Congratualations, wait confirm');
        }
        else{
            $this->session->set_userdata('mensagem', 'Something went wrong, please try again');
        }

    }



}