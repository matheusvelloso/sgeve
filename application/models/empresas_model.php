<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresas_model extends CI_Model {
	private $tabela = "empresa";
	
	public function insereNovaEmpresa($dados){
		$this->db->insert($this->tabela,$dados);
	}
	
	
	//Selects
	
	
	public function buscaEmpresaViaMaster($dados){
		/*Metodo utilizado possivelmente somente para o user master
		 * logo apos ter se registrado no sistema
		 * */
		return $this->db->get_where($this->tabela,array('nome' => $dados['nome'], 'idusuario' => $dados['idusuario']))->row_array();
	}
	
	public function buscaEmpresaViaID($id){
		
		return $this->db->get_where($this->tabela,array('idusuario' => $id))->row_array();
	}
	
	
}