<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    public function enviarComprovante(){
        $this->load->model('pagamento_model');
        $data = array(
            'numero'=> $this->input->post('numero'),
            'foto' => $_FILES['foto']
        );

        $config['upload_path'] = $this->base_img_dir();
        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $extensao = strrchr($_FILES['foto']['name'],'.');
        $_FILES['foto']['name'] = md5(microtime()).'_'.$this->session->userdata('login_id').$extensao;
        $this->upload->do_upload('foto');
        $picture = $this->upload->data();
        $dados['foto'] = base_url().'complemento/com/'.$picture['file_name'];
        $data['foto'] = $dados['foto'];
        $this->pagamento_model->criarComprovante($this->session->userdata('login_id'),$data);
        $this->usuario_model->atualizarStatus($this->session->userdata('login_id'),5);
        redirect('usuario/home');

    }

    public function base_img_dir(){
        return './complemento/com';
    }

    public function confirmarPagamento($id){
        $this->load->model('usuario_model');

        $usuario = $this->usuario_model->buscarUsuarioPorId($id);

        $dados['situacao_pagamento'] = 1;
        $dados['status'] = 6;

        $this->usuario_model->atualizarDados($id,$dados);

        if(!$usuario) {
            $this->session->set_userdata('Alert', 'ERRO, a operação foi efetuada, porém o email não foi enviado, por favor envie o e-mail manualmente.');
            redirect('pagamento/lista');
        } else {

            if ($usuario->tipo == 1) {
                $emailsender = 'amun@amun.org.br';
                $assunto = '[AMUN] Payment Confirmation';
                $mensagem = "Hello, ".$usuario->nome."! \r\n \r\nYour payment is now confirmed. \r\n \r\nYou are officially a participant on our conference. \r\nWelcome to the 18th AMUN, delegate! \r\nPlease, wait until the end of the First Round of Registrations (June 08th) to receive your representations and continue your registration process.\r\n \r\nBest regards,\r\n18th AMUN Secretariat";
                $headers = 'From: amun@amun.org.br' . "\r\n" .
                'Reply-To: amun@amun.org.br' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($usuario->email, $assunto, $mensagem, $headers, "-r".$emailsender);
            }else{
                $emailsender = 'amun@amun.org.br';
                $assunto = '[AMUN] Payment Confirmation';
                $mensagem = "Hello,".$usuario->nome."! \r\n \r\n We have received the confirmation of your payment. \r\n \r\n Please, wait for confirmation of country representation. \r\n";
                $headers = 'From: amun@amun.org.br' . "\r\n" .
                'Reply-To: amun@amun.org.br' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($usuario->email, $assunto, $mensagem, $headers, "-r".$emailsender);
            }
        }

        $this->session->set_userdata('Alert','Sucesso, pagamento confirmado e email enviado!');
        redirect('pagamento/lista');
    }

    public function calculaValorDelegacao($delegation){
        return $delegation->qtd_integrantes * 180 + $delegation->qtd_pacotes * 85; /*- $delegation->qtd_gratuidade;*/
    }
    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function payment(){
        $this->load->model('usuario_model');
        $this->load->model('delegacao_model');

        $user = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
        if ($user->tipo == 1) {
            if(($user->status) < 4){
                $this->session->set_userdata('Alert', 'You have steps to complete before payment.');
                redirect('usuario/home');
            }elseif(($user->status)==4) {
                if ($this->usuario_model->estrangeiro($this->session->userdata('login_id'))) {

                    $this->load->view('pagamento/paypal');
                } else {
                    $dados['valor'] = $this->usuario_model->retornaValorInsFesta($this->session->userdata('login_id'));
                    $dados['tipo'] = 1;
                    $this->load->view('pagamento/foto', $dados);
                }
            }elseif(($user->status)==5){
                $this->session->set_userdata('Alert', 'Please wait for your payment to be confirmed. Once it\'s confirmed, you will be informed by e-mail.');
                redirect('usuario/home');
            }elseif(($user->status)==6){
                $this->session->set_userdata('Alert', 'Your payment is now confirmed, see you at the 18th AMUN!');
                redirect('usuario/home');
            }
        }elseif ($user->tipo == 2) {

            if ($user->status == 1) {
                $this->session->set_userdata('Alert', 'You have steps to complete before payment.');
                redirect('usuario/home');
            }elseif($user->status == 2) {
                $this->session->set_userdata('Alert', 'For the payment be unlocked choose your preferences of countries and click the "Proceed to payment" button.');
                redirect('form/cadastroPaises');
            }elseif($user->status == 3){
                $delegation = $this->delegacao_model->buscarDelegacaoPorIdUsuario($this->session->userdata('login_id'));
                if ($delegation->qtd_gratuidade == 0) {

                    $dados['valor'] = $this->calculaValorDelegacao($delegation);
                    $dados['tipo'] = 2;
                    $this->load->view('pagamento/foto', $dados);
                }else{
                    $this->session->set_userdata('Alert', 'Please send e-mail to amun@amun.org.br with information (name , e- mail , cpf) of delegate who has gratuity. If you have already sent wait for confirmation.');
                    redirect('usuario/home');
                }
            }elseif($user->status == 5){
                $this->session->set_userdata('Alert', 'Please wait for your payment to be confirmed. Once it\'s confirmed, you will be informed by e-mail.');
                redirect('usuario/home');
            }else{
                $this->session->set_userdata('Alert', 'Your payment is now confirmed, see you at the 18th AMUN!');
                redirect('usuario/home');
            }
        }
    }

    public function lista(){
        $this->load->model('usuario_model');
        $this->load->model('pais_model');

        $dados['paises'] = $this->pais_model->buscarPaises()->result();
        $dados['users'] = $this->usuario_model->buscarUsuarios();
        $this->load->view('pagamento/lista',$dados);
    }
}

?>