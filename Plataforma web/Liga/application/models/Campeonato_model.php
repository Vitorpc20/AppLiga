<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonato_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function insereCampeonato($data)
	{
		return $this->db->insert('campeonato', $data);
	}
	public function selecionaCampeonato()
	{
		#tem que terminar isso daqui talquei
		#$query=$this->db->get('Pessoa');
        #return $query->result();	
	}

	public function listarCampeonatos(){

		$this->db->from('campeonato')
		->select('*');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}
}
?>