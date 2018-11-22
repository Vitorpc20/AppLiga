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

	public function deletarJogador($data)
	{
		$this->db->where('nome', $data);
		$this->db->delete('jogador');
	}

	public function atualiza($nome, $curso, $id_jogador)
	{

		$array = array(
        'nome' => $nome,
        'curso' => $curso,
		);

		$this->db->where('cod_jogador', $id_jogador);
		$this->db->update('jogador', $array);
	}
}
?>
