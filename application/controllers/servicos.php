<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		$this->load->model("servicos_model");
		
	}
		
	public function index()	{
		$idempresa 	= $this->session->userdata('empresa_logada')['idempresa'];	
		$servicos 	= $this->servicos_model->buscaTodosPorEmpresa($idempresa);
		
		$dados 		= array('servicos' => $servicos);
		
		$this->load->view('servicos/index', $dados);	
	}
	
	public function novo(){
		$dados 					= array();

		$dados['nome_arquivo']	= basename(__FILE__,'.php');
		
		$this->session->set_userdata('dados_sistema',$dados);
		
		if (!$this->input->post('cpfcnpj')) {
		
			$this->load->view('clientes/novo');	
		
		} else {
			
				$tipo 		= $this->input->post('tipo');
				$cliente 	= array(
					
					'tipo'		=> $tipo,
					'nome'		=> $this->input->post('nome'),
					'cpfcnpj'	=> $this->input->post('cpfcnpj'),
					'endereco'	=> $this->input->post('endereco'),
					'telefone'	=> $this->input->post('telefone'),
					'email'		=> $this->input->post('email'),
					'idempresa'	=> $this->session->userdata('empresa_logada')['idempresa']
					
				);
				
				if ($tipo == 1) {
					//PESSOA JURIDICA
					$cliente['nomefantasia'] 	= $this->input->post('nomefantasia');
					$cliente['responsavel'] 	= $this->input->post('responsavel'); 
				}
				
			$this->clientes_model->insereNovoCliente($cliente);
			$this->session->set_flashdata('sucesso_acao','Cliente cadastrado com sucesso.');
			redirect('clientes');
		}
		
	}

	
	public function editar($idcliente){
		
		$idempresa 	= $this->session->userdata('empresa_logada')['idempresa'];
		$dados = array('idempresa' => $idempresa, 'idcliente' => $idcliente);

		$cliente 	= $this->clientes_model->buscaEnquanto($dados);
		if (!empty($cliente)) {
			if (!$this->input->post('cpfcnpj')){
				
				$dados 		= array('cliente' => $cliente);
				$this->load->view('clientes/editar', $dados);
					
			} else{
						
					$tipo 		= $this->input->post('tipo');
					$cliente 	= array(
						'idcliente'	=> $idcliente,
						'tipo'		=> $tipo,
						'nome'		=> $this->input->post('nome'),
						'cpfcnpj'	=> $this->input->post('cpfcnpj'),
						'endereco'	=> $this->input->post('endereco'),
						'telefone'	=> $this->input->post('telefone'),
						'email'		=> $this->input->post('email'),
						'idempresa'	=> $idempresa
						
					);
					if ($tipo == 1) {
						//PESSOA JURIDICA
						$cliente['nomefantasia'] 	= $this->input->post('nomefantasia');
						$cliente['responsavel'] 	= $this->input->post('responsavel'); 
					}
					
					$this->clientes_model->atualizaCliente($cliente);
					$this->session->set_flashdata('sucesso_acao','Cliente atualizado com sucesso.');
					redirect('clientes');
					
					
			}
		
		} else {
			$this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
			redirect('clientes');
		}
		
	}

	public function deletar($idcliente){
			
		$idempresa 	= $this->session->userdata('empresa_logada')['idempresa'];
		$dados = array('idempresa' => $idempresa, 'idcliente' => $idcliente);

		$cliente 	= $this->clientes_model->buscaEnquanto($dados);
		if (!empty($cliente)) {
			
			$this->clientes_model->deletarCliente($dados);
			$this->session->set_flashdata('sucesso_acao','Cliente deletado com sucesso.');
			redirect('clientes');
		} else {
			$this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
			redirect('clientes');
		}
		
		
		
		
		
		
	}

}