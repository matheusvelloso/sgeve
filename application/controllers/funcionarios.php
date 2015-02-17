<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionarios extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->model("funcionarios_model");
		
	}
		
	public function index()	{
		
		$idempresa 			= $this->session->userdata('usuario_logado')['idempresa'];
		$idfuncionario 		= $this->session->userdata('usuario_logado')['idfuncionario'];
		$funcionarios 		= $this->funcionarios_model->buscaTodosPorEmpresa( $idempresa , $idfuncionario );
		
		$dados 				= array('funcionarios' => $funcionarios);
		//var_dump($dados);
		$this->load->view('funcionarios/index', $dados);
		$this->output->enable_profiler(TRUE);
	}
	
	public function novo(){
		$nivel = $this->session->userdata('usuario_logado')['nivel'];
		
		if (!$this->input->post('documento')) {
			$this->load->view('funcionarios/novo');	
		} else {
			
			$funcionario 	= array(
				'nivel'			=> '0',
				'nome'			=> $this->input->post('nome'),
				'sexo'			=> $this->input->post('sexo'),
				'dtnascimento'	=> $this->input->post('dtnascimento'),
				'tipodocumento'	=> $this->input->post('tipodocumento'),
				'documento'		=> $this->input->post('documento'),
				'endereco'		=> $this->input->post('endereco'),
				'telefone'		=> $this->input->post('telefone'),
				'idempresa'		=> $this->session->userdata('usuario_logado')['idempresa']
			);
			
			if ($this->input->post('painel_adm') == '1') {
					$funcionario['nivel'] = '1';
			}
			if ($this->input->post('painel_adm') == '1' and $this->input->post('mais_privado') == '1') {
					$funcionario['nivel'] = '2';	
			}
			
			$this->funcionarios_model->insereNovoFuncionario($funcionario);
			
			if ($funcionario['nivel'] > 0) {
				
				$idfuncionario = $this->funcionarios_model->retornaID($funcionario);
				if (!empty($idfuncionario)) {
					$usuario = array(
						'email' 		=> $this->input->post('email'),
						'senha' 		=> md5($this->input->post('senha')),
						'idfuncionario' => $idfuncionario
					);
					$this->usuarios_model->insereNovoUsuario($usuario);
				}
			}
			
			$this->session->set_flashdata('sucesso_acao','Funcionário cadastrado com sucesso.');
			redirect('funcionarios');
		}
		
	}

	
	public function editar($idfuncionario){
		
		$idempresa 		= $this->session->userdata('usuario_logado')['idempresa'];
		
		$dados 			= array('idempresa' => $idempresa, 'idfuncionario' => $idfuncionario);

		$funcionario 	= $this->funcionarios_model->buscaEnquanto($dados);
		if (!empty($funcionario)) {

			$funcionario['email'] = null;

			if (!$this->input->post('documento')){
				if ($funcionario['nivel'] > '0') {
					$usuario = $this->usuarios_model->buscaEnquanto(array('idfuncionario' => $funcionario['idfuncionario']));
					$funcionario['email'] = $usuario['email'];
					
				}
				$dados 		= array('funcionario' => $funcionario);
				$this->load->view('funcionarios/editar', $dados);
					
			} else{
						
					$funcionario 	= array(
						'nivel'			=> '0',
						'nome'			=> $this->input->post('nome'),
						'sexo'			=> $this->input->post('sexo'),
						'dtnascimento'	=> $this->input->post('dtnascimento'),
						'tipodocumento'	=> $this->input->post('tipodocumento'),
						'documento'		=> $this->input->post('documento'),
						'endereco'		=> $this->input->post('endereco'),
						'telefone'		=> $this->input->post('telefone'),
						'idempresa'		=> $this->session->userdata('usuario_logado')['idempresa']
					);
					// atualiza nivel do funcionario de acordo com o nivel do usuario logado
					if ($this->session->userdata('usuario_logado')['nivel'] > '1') {
						if ($this->input->post('painel_adm') == '1') {
							$funcionario['nivel'] = '1';
							if ($this->input->post('mais_privado') == '1') {
								$funcionario['nivel'] = '2';
							}
							//cadastra usuario caso nao tenha usuario para o funcionario
							$usuario = $this->usuarios_model->buscaEnquanto(array('idfuncionario' => $idfuncionario));
							if (empty($usuario)) {
								if ($this->input->post('email') && $this->input->post('senha')) {
									
								}
							} else{

							}
						}
						else{
							$funcionario['nivel'] = '0';
						}
					}
					if ($funcionario['nivel'] == '0') {
						$usuario = $this->usuarios_model->buscaEnquanto(array('idfuncionario' => $idfuncionario));
						if (!empty($usuario)) {
							$this->usuarios_model->deletaUsuario($usuario);
						}
					}
					//Testar módulo de edição
					//$this->output->enable_profiler(TRUE);
					var_dump($funcionario);
					exit;
					$this->funcionarios_model->atualizaFuncionario($funcionario);
					$this->session->set_flashdata('sucesso_acao','Funcionário atualizado com sucesso.');
					redirect('funcionarios');
					
			}
		
		} else {
			$this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
			redirect('funcionarios');
		}
		
	}

	public function deletar($idfuncionario){
			

		$idempresa 	= $this->session->userdata('usuario_logado')['idempresa'];
		
		$dados = array('idempresa' => $idempresa, 'idfuncionario' => $idfuncionario);

		$funcionario 	= $this->funcionarios_model->buscaEnquanto($dados);
		
		if (!empty($funcionario)) {
			if ($this->session->userdata('usuario_logado')['nivel'] <= $funcionario['nivel']){
			    $this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
			    redirect('funcionarios');
			}	
			$this->funcionarios_model->deletaFuncionario($dados);
			$this->session->set_flashdata('sucesso_acao','Funcionário deletado com sucesso.');
			redirect('funcionarios');
		} else {
			$this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
			redirect('funcionarios');
		}

	}

}
