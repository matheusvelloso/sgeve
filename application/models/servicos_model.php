<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Servicos_model extends CI_Model {
	private $tabela = "servico";
	
	
	//Inserts
	public function insereNovoServico($dados){
		$this->db->insert($this->tabela,$dados);
	}
	
	
	//Updates
	function atualizaServico($servico){
		
		$where = array(
		'idservico'	=> $servico['idservico'],
		'idempresa'	=> $servico['idempresa']
		);
		$this->db->update($this->tabela,$servico,$where );
	}
	
	
	//SELECTS
	function buscaTodosPorEmpresa($id){
		$where = array('idempresa' => $id);
		return $this->db->get_where($this->tabela,$where)->result_array();
	}
	
	function buscaEnquanto($where){
		return $this->db->get_where($this->tabela,$where)->row_array();
	}

	//DELETES
	
	function deletarServico($idempresa, $idservico){
		$where = array(
		'idempresa' => $idempresa,
		'idservico' => $idservico
		);		
		$this->db->delete($this->tabela, $where);
	}
	
	
	
}