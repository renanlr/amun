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
}