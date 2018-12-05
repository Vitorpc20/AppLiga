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
	public function selecionaCurso($data)
	{
		$this->db->select('nome');
		$this->db->from('curso');
		$this->db->where('nome', $name);
		return $query = $this->db->get();
	}

	public function listarCursos($data){

		$this->db->from('campeonato_curso')
		->select('*')
		->where('cod_campeonato', $data);

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}
	public function listarTodosCursos(){

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

	public function atualiza($novo, $antigo)
	{
		$this->db->set('nome', $novo);
		$this->db->where('nome', $antigo);
		$this->db->update('curso');
	}

	public function adiciona($data)
	{
		return $this->db->insert('campeonato_curso', $data);
	}
	public function removeCursoCampeonato($data)
	{
		$this->db->where($data);
		var_dump($data);
		#$this->db->where('curso', $data['curso'], 'cod_campeonato', $data['cod_campeonato']);
		$this->db->delete('campeonato_curso');
		
	}
}
?>
