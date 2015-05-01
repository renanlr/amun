<?php

class Form_Model extends CI_Model {

   public function inserirFormIcty($data){
        $this->db->insert('individual_icty',$data);
    }
}