<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogador_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function insereJogador($data)
	{
		$this->db->insert('jogador', $data);
	}
	public function selecionaJogador()
	{
		#tem que terminar isso daqui talquei
		#$query=$this->db->get('Pessoa');
        #return $query->result();	
	}
	public function listarJogadores(){

		$this->db->from('jogador')
		->select('*');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}
}
?>
