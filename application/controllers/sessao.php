<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessao extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');	
		$this->load->model('empresas_model');
		$this->load->model('funcionarios_model');
	}
	
	public function index(){
	return $this->load->view('sessao/index');
	}
	
	public function login(){	
		//$this->output->enable_profiler(TRUE);
		$email 	= 	$this->input->post('email');
		$senha 	=	md5($this->input->post('senha'));
		$dados 	= 	array('email' => $email, 'senha' => $senha);
		
		$usuario 	= $this->usuarios_model->buscaEnquanto($dados);
		
		// MUDAR A LOGICA DESTE IFF - pendente
		if (!empty($usuario)) {

			$dados = $this->usuarios_model->criaSessao($usuario['idusuario']);
			$this->session->set_userdata('usuario_logado',$dados);
			
			redirect('/');
			
		} else {
			$this->session->set_flashdata('senha_errada', 'Usuário ou Senha Inválidas.');	
			redirect('sessao');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_sucesso', 'Você se deslogou com sucesso.');
		
		redirect('sessao');
	}

	public function registrar(){
		//Falta validar se o e-mail é unico - pendente
		 
		 /*Caso o usuario nao tenha setado o campo 'conf_senha', so mostra o form, caso contrario, faz o cadastro*/
		if (!$this->input->post('conf_senha')) {
			return $this->load->view('sessao/registrar');	
		}
		else {
			if ($this->input->post('conf_senha') === $this->input->post('senha')) {
				try{
				//$this->output->enable_profiler(TRUE);
				//Insere o user, busca o seu id e coloca o user na sessao
				
					$dados 	= 	array(
					'email' => 	$this->input->post('email'), 
					'senha' => 	md5($this->input->post('senha'))
					);
					
					$this->usuarios_model->insereNovoUsuario($dados);
					
					$usuario = $this->usuarios_model->buscaEnquanto($dados);
				
				
				
				
				// Insere Empresa com nome da empresa e id do user master
				// Cria a session da empresa_logada
				
					$dados 		= 	array(
					'nome' 		=> 	$this->input->post('nome_empresa'),
					'idusuario' => 	$usuario['idusuario']
					);
					
					$this->empresas_model->insereNovaEmpresa($dados);
					
					$empresa = $this->empresas_model->buscaEmpresaViaMaster($dados);
					
				
				
				
				// Insere o master como 1º funcionario da empresa
					$dados 		= 	array(
					'nome' 		=>  $this->input->post('nome'),
					'nivel'		=> 	'2',
					'idempresa'	=>	$empresa['idempresa']
					);
					
					$idfuncionario = $this->funcionarios_model->insereFuncionarioRetornaID($dados);
					 
				
				
				//Atualiza o usuario com o id do seu cadastro na da tabela de
				//funcionario
				
				array_unshift($usuario,$idfuncionario);
				$this->usuarios_model->atualizaUsuarioIDFuncionario($usuario);
				
				//cria sessao
				$dados = $this->usuarios_model->criaSessao($usuario['idusuario']);
				$this->session->set_userdata('usuario_logado',$dados);	

				redirect('/');
				
				}catch(exception $e){
					echo $e;
				}
			} else {
				//Retorna uma mensagem de erro
				$this->session->set_flashdata('senha_errada', 'As senhas devem ser iguais.');
				$this->load->view('sessao/registrar');
			}
		}	
	}

	public function teste(){
		$dados 		= 	array(
					'nome' 		=>  'Matheus',
					'nivel'		=> 	'2',
					'idempresa'	=>	'6'
					);

		$result = $this->funcionarios_model->teste($dados);
		$this->output->enable_profiler(TRUE);

		var_dump($result);

		
	}
}