<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Clientes_model extends CI_Model {
	private $tabela = "cliente";
	
	
	//Inserts
	public function insereNovoCliente($dados){
		$this->db->insert($this->tabela,$dados);
	}
	
	
	//Updates
	function atualizaCliente($cliente){
		
		$where = array(
		'idcliente'	=> $cliente['idcliente'],
		'idempresa'	=> $cliente['idempresa']
		);
		$this->db->update($this->tabela,$cliente,$where );
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
	
	function deletarCliente($where){
				
		$this->db->delete($this->tabela, $where);
	}
	
	
	
}