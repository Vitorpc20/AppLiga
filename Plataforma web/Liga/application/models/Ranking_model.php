<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function alterarRanking($data)
	{
		$this->db->where("curso", $data['curso']);
		$this->db->update("campeonato_curso", $data);
	}
	public function inserirRanking($data)
	{
		$this->db->insert('campeonato_curso', $data);
	}

	public function listarRanking()
	{
		$this->db->from('campeonato_curso')
		->select('*')
		->order_by('pontuacao','desc');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();	
	}

	
}
?>
