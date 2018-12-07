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
	public function listarJogadores(){

		$this->db->from('jogador')
		->select('*')
		->order_by('curso')
		->order_by('nome');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}

	public function deletarJogador($data)
	{
		$this->db->where('cod_jogador',$data);
		$this->db->delete('jogador');
	}

	public function removeJogadorPartida($jogo, $jogador)
	{
		$this->db->where('cod_jogador',$jogador);
		$this->db->where('cod_jogo',$jogo);
		$this->db->delete('jogador_jogo');
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

	public function buscaAuto($data)
	{
		$this->db->like('nome', $data, 'after');
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('jogador')->result();
	}

	public function selecionaJogador($jogador)
	{
		$this->db->from('jogador');
		$this->db->where('nome', $jogador);
		$this->db->select('cod_jogador');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}

	public function selecionaJogadorCurso($jogador, $curso)
	{
		$this->db->from('jogador');
		$this->db->where('cod_jogador', $jogador);
		$this->db->where('curso', $curso);
		$this->db->select('cod_jogador');

		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
	}

	public function insereJogadorPartida($data)
	{
	 	$this->db->insert('jogador_jogo', $data);	
	} 

	public function selecionaJogadorPartidaTime1($data, $jogo)
    {
    	$this->db->from("jogador AS j, jogador_jogo AS jj");
    	$this->db->where("jj.cod_jogo", $data);
		$this->db->where("j.cod_jogador = jj.cod_jogador");
		$this->db->where("j.curso", $jogo["curso1"]);
		$this->db->select("j.cod_jogador, j.nome, j.curso, jj.numero, jj.pontuacao");
		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
    }

    public function selecionaJogadorPartidaTime2($data, $jogo)
    {
    	$this->db->from("jogador AS j, jogador_jogo AS jj");
    	$this->db->where("jj.cod_jogo", $data);
		$this->db->where("j.cod_jogador = jj.cod_jogador");
		$this->db->where("j.curso", $jogo["curso2"]);
		$this->db->select("j.cod_jogador, j.nome, j.curso, jj.numero, jj.pontuacao");
		$busca = $this->db->get();

		return ($busca->num_rows() > 0) ? $busca->result_array() : array();
    }

    public function atualizaJogadorPartida($data){

    	foreach ($data as $value) {

    		$this->db->where('cod_jogador', $value["cod_jogador"]);
			$this->db->update('jogador_jogo', $value);
    	}
    }
}
?>
