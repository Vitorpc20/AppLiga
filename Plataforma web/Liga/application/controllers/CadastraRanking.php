<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastraRanking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function Index()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);


		$this->load->model('Ranking_model');
		$ranking = $this->Ranking_model->listarRanking($campeonato);
		$this->session->set_flashdata('ranking', $ranking);
		

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursos', $cursos);

		$this->load->view('ranking');
		
	}
	public function atualiza()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);


		$this->load->library('form_validation');

		$this->form_validation->set_rules('curso', 'Curso', 'required');

		$this->form_validation->set_rules('pontuacao', 'Pontuação', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Ranking_model');
			$ranking = $this->Ranking_model->listarRanking($campeonato);
			$this->session->set_flashdata('ranking', $ranking);
			

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->view('ranking', $mensagem);
		} else {
			$data = array(
			'curso' => $this->input->post('curso'),
			'cod_campeonato' => $campeonato,
			'pontuacao' => $this->input->post('pontuacao'));
			//Transfering data to Model

			$this->load->model("Ranking_model");
			$this->Ranking_model->alterarRanking($data);
			$mensagem = ['mensagem_cadastro' => "Ranking Atualizado!"];

			//Loading View
			$this->load->model('Ranking_model');
			$ranking = $this->Ranking_model->listarRanking($campeonato);
			$this->session->set_flashdata('ranking', $ranking);
			

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->view('ranking', $mensagem);
		}
	}


}
?>