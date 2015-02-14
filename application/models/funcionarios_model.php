<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionarios_model extends CI_Model {
	private $tabela = "funcionario";
	
	
	//Inserts
	public function insereNovoFuncionario($dados){
		$this->db->insert($this->tabela,$dados);
	}
	
	
	function insereFuncionarioRetornaID($dados){
		
		$this->db->insert($this->tabela,$dados);
		
		$result = $this->buscaEnquanto($dados);
		return (int)$result['idfuncionario'];
	}
	
	//Updates
	function atualizaFuncionario($funcionario){
		
		$where = array(
		'idfuncionario'	=> $funcionario['idfuncionario'],
		'idempresa'		=> $funcionario['idempresa']
		);
		$this->db->update($this->tabela,$funcionario,$where );
	}
	
	//SELECTS
	function buscaTodosPorEmpresa($idempresa, $idfuncionario){
		$where = array(
			'idfuncionario !='	=> $idfuncionario,
			'idempresa' 		=> $idempresa
			);
		return $this->db->get_where($this->tabela,$where)->result_array();
	}
	
	function buscaEnquanto($where){
		
		return $this->db->get_where($this->tabela,$where)->row_array();
	}
	
	function retornaID($where){
		$this->db->select('idfuncionario');
		$dados = $this->db->get_where($this->tabela,$where)->row_array();
		return (int)$dados['idfuncionario'];
	}

	function teste($dados){
		return $this->db->get_where($this->tabela,$dados)->row_array();
		
	}

	//DELETES
	
	function deletaFuncionario($where){	
		$this->db->delete($this->tabela, $where);
	}
	
	
}