<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuarios_model extends CI_Model {
	private $tabela = "usuario";
	
	
	//Inserts
	function insereNovoUsuario($dados){
		$this->db->insert($this->tabela,$dados);
	}
	
	
	//Selects
	function buscaEnquanto($dados){
		return $this->db->get_where($this->tabela,$dados)->row_array();
	}

	function criaSessao($idusuario){
		$this->db->select("f.idfuncionario,f.nome 'nome_funcionario',f.nivel, e.nome 'nome_empresa', e.idempresa, u.*");
		$this->db->from('usuario u');
		$this->db->join('funcionario f', 'f.idfuncionario = u.idfuncionario');
		$this->db->join('empresa e', 'e.idempresa = f.idempresa');
		$this->db->where('u.idusuario', $idusuario);
		
		return $this->db->get()->row_array();
	}

	//Updates
	function atualizaUsuarioIDFuncionario($dados){
		$set = array('idfuncionario' => $dados[0]);
		$this->db->update($this->tabela,$set, array('email' => $dados['email'], 'senha' => $dados['senha']));
	}

	//DELETES
	function deletaUsuario($where){	
		$this->db->delete($this->tabela, $where);
	}
	
	
}