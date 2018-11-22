<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partida_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function inserePartida($data)
	{
		$this->db->insert('jogo', $data);
	}
	public function selecionaPartida()
	{
		#tem que terminar isso daqui talquei
		#$query=$this->db->get('Pessoa');
        #return $query->result();	
	}
	public function listarPartidas(){

		$this->db->from('jogo')
		->select('*');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}

	public function deletarPartida($data)
	{
		$this->db->where('cod_jogo', $data);
		$this->db->delete('jogo');
	}

	public function atualizaPartida($array, $id)
	{
		$this->db->where('cod_jogo', $id);
		$this->db->update('jogo', $array);
	}
}
?>
