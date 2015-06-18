<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delegacao extends CI_Controller {

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

        $resDeleg = $this->delegacao_model->buscarTodosDadosDelegacaoPorId($id);
        $delegacao = $resDeleg[0];
        $stringPaises = "";
        $aux = 0;

        //die(var_dump($delegacao));

        if ($delegacao->qtd_integrantes != $sum) {
            $this->session->set_userdata('Alert','Please, choose an option that corresponds with the number of delegates.');
            redirect('delegacao/lista');
        } else {
            foreach ($paises as $pais) {
                if ($pais == -1) {
                    continue;
                }else{
                    if ($aux == 0) {
                        $stringPaises .= $this->paises_model->buscarPaisPorId($pais)->nome;
                        $aux += 1;
                    } else {
                        $stringPaises .= " ,".$this->paises_model->buscarPaisPorId($pais)->nome;
                        $aux += 1;
                    }
                    $data['delegacao_iddelegacao'] = $id;
                    $this->paises_model->definirRepresentacaoDePais($pais,$data);
                }
            }
            $this->session->set_userdata('Alert','Representation registered');

            $emailsender = 'amun@amun.org.br';
            $assunto = '[AMUN] Representation Info';
            $mensagem = "<meta charset=utf-8>"."Hello head delegate!\r\n\r\nWe have great news for you!\r\nThe representations for the 18th AMUN have been assigned and your delegation will be representing <div style=\"font-weight:bold;\">".$stringPaises."</div>. \r\n\r\nCongratulations!!!\r\nSoon you'll be able to register you delegation, wait for it!\r\nKeep an eye on our social media. \r\nSee you in August,\r\n\r\n18th AMUN Secretariat";
            $headers = 'From: amun@amun.org.br' . "\r\n" .
            'Reply-To: amun@amun.org.br' . "\r\n" .
            'Content-type: text/html; charset=utf-8'."\r\n".
            'X-Mailer: PHP/' . phpversion();
            mail($delegacao->email, $assunto, $mensagem, $headers, "-r".$emailsender);

            redirect('delegacao/lista');
        }
    }

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function lista(){
        $this->load->model('usuario_model');
        $this->load->model('pais_model');
        $this->load->model('delegacao_model');

        $dados['delegacoes'] = $this->delegacao_model->buscarDelegacoesPagantes();
        $dados['paises'] = $this->pais_model->buscarPaises()->result();
        $this->load->view('delegacao/lista',$dados);
    }

    public function listaPreferencias($id){
        $this->load->model('paises_model');
        $this->load->model('delegacao_model');

        $dados['paises'] = $this->paises_model->buscarPaises();
        $opt_paises = $this->paises_model->buscarOpcoesDePaisesCadastrados($id);
        $i = 0;
        foreach ($opt_paises as $opt) {
            $dados['opt_paises'][$i] = json_decode($opt->combinacao);
            $i += 1;
        }

        $delegacao = $this->delegacao_model->buscarTodosDadosDelegacaoPorId($id);
        $dados['delegacao'] = $delegacao[0];

        $this->load->view('delegacao/listaPreferencias',$dados);
    }
}

?>