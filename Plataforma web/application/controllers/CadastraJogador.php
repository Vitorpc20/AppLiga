<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastraJogador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function Index()
	{
		$this->load->model('Jogador_model');
		$jogadores = $this->Jogador_model->listarJogadores();
		$this->session->set_flashdata('jogadores', $jogadores);
		$this->load->view('cadastro_jogador');
	}
	public function cadastra()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome_jogador', 'Nome', 'required');

		$this->form_validation->set_rules('curso_jogador', 'Curso', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->view('cadastro_jogador', $mensagem);
		} else {
			$data = array(
			'nome' => $this->input->post('nome_jogador'),
			'curso' => $this->input->post('curso_jogador'));
			//Transfering data to Model

			$this->load->model("Jogador_model");
			$this->Jogador_model->insereJogador($data);
			$mensagem = ['mensagem_cadastro' => "Jogador cadastrado!"];

			//Loading View
			$this->load->model('Jogador_model');
			$jogadores = $this->Jogador_model->listarJogadores();
			$this->session->set_flashdata('jogadores', $jogadores);
			$this->load->view('cadastro_jogador', $mensagem);
		}
	}
}
?>