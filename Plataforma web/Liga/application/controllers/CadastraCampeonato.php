<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastraCampeonato extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// Encaminha para os menus laterais
	public function index()
	{
		$this->load->model('Campeonato_model');
		$campeonatos = $this->Campeonato_model->listarCampeonatos();
		$this->session->set_flashdata('campeonatos', $campeonatos);
		$this->load->view('cadastro_campeonato');
	}
	public function cadastra()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome_campeonato', 'Nome', 'required');

		$this->form_validation->set_rules('ano_campeonato', 'Ano', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Campeonato_model');
			$campeonatos = $this->Campeonato_model->listarCampeonatos();
			$this->session->set_flashdata('campeonatos', $campeonatos);
			$this->load->view('campeonatos', $mensagem);
		} else {
			$data = array(
			'nome' => $this->input->post('nome_campeonato'),
			'ano' => $this->input->post('ano_campeonato'));
			//Transfering data to Model


			$this->load->model("Campeonato_model");
			$query = $this->Campeonato_model->selecionaCampeonato($data);

			if(!$query){
				$this->load->model("Campeonato_model");
				$this->Campeonato_model->insereCampeonato($data);
				$mensagem = ['mensagem_cadastro' => "Campeonato cadastrado!"];

				//Loading View
				$this->load->model('Campeonato_model');
				$campeonatos = $this->Campeonato_model->listarCampeonatos();
				$this->session->set_flashdata('campeonatos', $campeonatos);
				$this->load->view('campeonatos', $mensagem);
			}else{
				$mensagem = ['mensagem_erro' => "Campeonato já existente!"];

				//Loading View
				$this->load->model('Campeonato_model');
				$campeonatos = $this->Campeonato_model->listarCampeonatos();
				$this->session->set_flashdata('campeonatos', $campeonatos);
				$this->load->view('campeonatos', $mensagem);
			}
		}
	}

	public function Sair()
	{
		$this->load->view('login');
	}
}
?>
