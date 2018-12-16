<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestapp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function index()
	{

		#busca campeonato
		$this->load->model('Campeonato_model');
		$campeonatos = $this->Campeonato_model->listarCampeonatos();
		#var_dump($campeonatos);
		$data = array();
		foreach ($campeonatos as $camp) {
			//var_dump($camp);
			//echo("<br>");
			#busca partidas do campeonato
			$this->load->model('Partida_model');
			$partidas = $this->Partida_model->listarPartidas($camp['cod_campeonato']);
			#var_dump($partidas);
			//array_push($camp, $partidas);
			$todasPartidas = array();
			foreach ($partidas as $part) {
				//echo("Partida: ");
				//var_dump($part);
				//echo("<br>");
				#busca jogadores da partida time 1
				$this->load->model('Jogador_model');
				$jogadores1 = $this->Jogador_model->selecionaJogadorPartidaTime1($part['cod_jogo'], $part);
				#var_dump($jogadores1);
				$jTime1 = array();
				foreach ($jogadores1 as $j1) {
					array_push($jTime1, $j1);

				}
				
				#busca jogadores da partida time 2
				$this->load->model('Jogador_model');
				$jogadores2 = $this->Jogador_model->selecionaJogadorPartidaTime2($part['cod_jogo'], $part);
				#var_dump($jogadores2);
				$jTime2 = array();
				foreach ($jogadores2 as $j2) {
					array_push($jTime2, $j2);
				}
				$teste = array();
				array_push($teste, $jTime1);
				array_push($teste, $jTime2);
				array_push($part, $teste);
				array_push($todasPartidas, $part);
				
			}
			array_push($camp, $todasPartidas);
			
			$this->load->model('Ranking_model');
			$ranking = $this->Ranking_model->listarRanking($camp['cod_campeonato']);
			array_push($camp, $ranking);
		
			array_push($data, $camp);
			
		}
		//var_dump($data);
		$encode = json_encode($data);
		//echo("<br>");
		print_r($encode);
	}
}

?>