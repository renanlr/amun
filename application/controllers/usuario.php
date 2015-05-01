<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    public function index() {
		if ($this->session->userdata('login_id') != false) {
            redirect('usuario/home');
        } else {
            redirect('usuario/login');
        }
	}
    
    public function logar() {
        $this->load->model('usuario_model');
    
        $login = $this->input->post('login');
        $senha = md5($this->input->post('senha'));

        $usuario = $this->usuario_model->buscarUsuario($login, $senha);
        var_dump($usuario);
        if (!$usuario) {
            $this->session->set_userdata('mensagem','Login e/ou senha inválido(s).');
            redirect('usuario/login');
        } else {
            $dados = array(
                'login_id' => $usuario->idusuario,
                'login_email' => $usuario->email,
                'login_perfil' => $usuario->tipo
            );
            $this->session->set_userdata($dados);
            redirect('usuario/home');
        }
    }

    public function recuperarSenha() {
        $this->load->model('usuario_model');

        $email = $this->input->post('email');
        $usuario = $this->usuario_model->buscarEmail($email);
        if(!$usuario) {
            $this->session->set_userdata('mensagem', 'E-mail não cadastrado.');
            redirect('usuario/recuperacaoSenha');
        } else {
            $senha = random_string('alnum', 9);
            $this->usuario_model->atualizarSenha($usuario->id, md5($senha));
            $assunto = '[AMUN] New Password';
            $mensagem = "Hello, $usuario->email! \r\n \r\nYour new password is: \r\n \r\n$senha \r\n";
            $headers = 'From: amun@amun.org.br' . "\r\n" .
            'Reply-To: amun@amun.org.br' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($email, $assunto, $mensagem, $headers);
            $this->session->set_userdata('mensagem', "Your new password was sent to your e-mail!");
            $this->load->view('usuario/login');
        }   
    }

    public function deslogar(){
        $this->session->sess_destroy();
        redirect('usuario/login');
    }

    public function cadastrar(){
        $this->load->model('usuario_model');

        $data = array(
            'nome' => $this->input->post('name'),
            'sobrenome' => $this->input->post('surName'),
            'nome_cracha' => $this->input->post('badgeName'),
            'email' => $this->input->post('email'),
            'senha' => md5($this->input->post('senha')),
            'celular' => $this->input->post('cel'),
            'cep' => $this->input->post('zip'),
            'cidade' => $this->input->post('city'),
            'estado' => $this->input->post('state'),
            'lista_paises_id' => $this->input->post('country'),
            'identification' => $this->input->post('identification'),
            'tipo' => $this->input->post('tipo'),
            'status' => 1
        );

        if ($this->usuario_model->buscarEmail($data['email']) != false) {
            $this->session->set_userdata('mensagem', 'This e-mail already exists');
            redirect('usuario/cadastro');
        } elseif ($data['tipo'] == 1 || $data['tipo'] == 2) {
            $this->usuario_model->inserirUsuario($data);
            $this->session->set_userdata('mensagem', 'Success, try login');
            redirect('usuario/login');
        } else {
            $this->session->set_userdata('mensagem', 'Something went wrong, please try again');
            redirect('usuario/cadastro');
        }
    }

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function home() {
        $this->load->model('usuario_model');
        $dados = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));

        if ($this->session->userdata('login_perfil') == 3) {
            redirect('home/admin');
        } elseif ($this->session->userdata('login_perfil') == 2) {
            $this->load->view('home/delegation', $dados);
        } elseif ($this->session->userdata('login_perfil') == 1) {
            $this->load->view('home/individual', $dados);
        }
    }

    public function login() {
        $this->load->view('usuario/login');
    }

    public function recuperacaoSenha(){
        $this->load->view('usuario/recuperacao_senha');
    }

    public function cadastro() {
        $this->load->model('pais_model');
        $dados['paises'] = $this->pais_model->buscarPaises()->result();
        $this->load->view('usuario/cadastro',$dados);
    }
        
}

?>