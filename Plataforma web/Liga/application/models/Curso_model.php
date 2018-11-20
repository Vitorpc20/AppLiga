<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function insereCurso($data)
	{
		return $this->db->insert('curso', $data);
	}
	public function selecionaCurso()
	{
		#tem que terminar isso daqui talquei
		#$query=$this->db->get('Pessoa');
        #return $query->result();	
	}

	public function listarCursos(){

		$this->db->from('curso')
		->select('*');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}
	public function deletarCurso($data)
	{
		$this->db->where('nome', $data);
		$this->db->delete('curso');
	}
}
?>
