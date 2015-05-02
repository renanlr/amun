<?php

class Pagamento_Model extends CI_Model
{
    public  function  criarComprovante($id,$dados){
        $this->db->where('idusuario', $id);
        if($this->db->update('usuario', $dados)){
            $this->session->set_userdata('Alert', 'Thank you. Wait for payment confirmation.');
        }
        else{
            $this->session->set_userdata('Alert', 'Something went wrong, please try again');
        }

    }



}