<?php

class Delegado_Model extends CI_Model{

    public function buscarDelegadosPorIdUsuario($idusuario){
    	$this->db->where('delegacao_idusuario', $idusuario);
        $delegacao = $this->db->get('delegacao')->row();

        $this->db->where('delegacao_iddelegacao', $delegacao->iddelegacao);
        return $this->db->get('delegado')->result();

    }

    public function montarListaDeRepresentacao($idusuario){
        $idusuario = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $idusuario);

        $resultado = $this->db->query("SELECT p.nome as nomepais,com.nome as nomecomite,ch.id, ch.qtd_vagas
                                        from usuario u,delegacao d,paises p,Comite com,Comite_has_paises ch
                                        WHERE u.idusuario =".$idusuario."
                                        and d.delegacao_idusuario = u.idusuario
                                        and d.iddelegacao = p.delegacao_iddelegacao
                                        and p.idpaises = ch.paises_idpaises
                                        and ch.Comite_idComite = com.idComite")->result();

        $representations = array();
        foreach($resultado as $r){
            if($this->qtdDelegadosNaRepresentacao($r->id) < $r->qtd_vagas){
              array_push($representations,$r);
            }
        }
        return $representations;
    }

    public function qtdDelegadosNaRepresentacao($id){
        return $this->db->query("SELECT COUNT(*) as qtd FROM delegado WHERE Comite_has_paises_id = ".$id)->row()->qtd;

    }

    public function qtdDelegadosNaDelegacao($id){
        return $this->db->query("SELECT COUNT(*) as qtd FROM delegado WHERE delegacao_iddelegacao = ".$id)->row()->qtd;

    }

    public function podeCadastrarDelegado($idusuario){
        $resultado = $this->db->query("SELECT * from usuario u,delegacao d
                                        WHERE u.idusuario =".$idusuario."
                                        and d.delegacao_idusuario = u.idusuario")->row();

        if($this->qtdDelegadosNaDelegacao($resultado->iddelegacao) < $resultado->qtd_integrantes){
            return true;
        } else {
            return false;
        }

    }

    public function inserirDelegado($data){
        $this->db->insert('delegado',$data);
    }

    public function montarStringRepresentacao($id){
        $resultado = $this->db->query("SELECT p.nome as nomepais,com.nome as nomecomite
                                        from paises p,Comite com,Comite_has_paises ch
                                        WHERE ch.id =".$id."
                                        and p.idpaises = ch.paises_idpaises
                                        and ch.Comite_idComite = com.idComite")->row();
        return "Representing ".$resultado->nomepais." at ".$resultado->nomecomite;
    }

    public function excluirDelegado($id){
        $this->db->where('iddelegado', $id);
        return $this->db->delete('delegado');
    }
}