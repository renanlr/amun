<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class individual extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------


    public function cadastrarPaises(){
        $this->load->model('form_model');
        $this->load->model('usuario_model');
        $this->load->model('paises_model');
        $this->load->model('delegacao_model');

        $paises = array(
          'country1' => $this->input->post('country1'),
          'country2' => $this->input->post('country2'),
          'country3' => $this->input->post('country3'),
          'country4' => $this->input->post('country4'),
          'country5' => $this->input->post('country5'),
          'country6' => $this->input->post('country6'),
        );

        $id = $this->input->post('id');

        $sum = 0;

        foreach ($paises as $opcao) {
            if ($opcao == -1) {
              continue;
            }else{
              $sum += $this->paises_model->buscarPaisPorId($opcao)->qtd_participantes;
            }
        }

        $delegacao = $this->delegacao_model->buscarDelegacaoPorId($id);

        if ($delegacao->qtd_integrantes != $sum) {
            $this->session->set_userdata('Alert','Please, choose an option that corresponds with the number of delegates.');
            redirect('delegacao/listaPreferencias'.$id);
        } else {
            foreach ($paises as $pais) {
                if ($pais == -1) {
                    continue;
                }else{
                    $data['delegacao_iddelegacao'] = $id;
                    $this->paises_model->definirRepresentacaoDePais($pais,$data);
                }
            }
            $this->session->set_userdata('Alert','Representation registered');
            redirect('delegacao/lista');
        }
    }

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function listaPress(){
        $this->load->model('usuario_model');
        $this->load->model('pais_model');
        $this->load->model('individual_model');

        $dados['delegados'] = $this->individual_model->buscarIndividualPress();
        $dados['paises'] = $this->pais_model->buscarPaises()->result();
        $this->load->view('individual/listaPress',$dados);
    }

    public function listaIcty(){
        $this->load->model('usuario_model');
        $this->load->model('pais_model');
        $this->load->model('individual_model');

        $dados['delegados'] = $this->individual_model->buscarIndividualIcty();
        $dados['paises'] = $this->pais_model->buscarPaises()->result();
        $this->load->view('individual/listaIcty',$dados);
    }

    public function selecionarTipo(){
        $this->load->view('individual/selecionar');
    }
}

?>