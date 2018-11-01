<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastraCurso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function index()
	{
		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos();
		$this->session->set_flashdata('cursos', $cursos);
		$this->load->view('cadastro_curso');
	}
	public function cadastra()
	{
		
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nome_curso', 'Nome', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->view('cadastro_curso', $mensagem);
		} else {
			$data = array(
			'nome' => $this->input->post('nome_curso'));
			//Transfering data to Model

			$this->load->model("Curso_model");
			$this->Curso_model->insereCurso($data);
			$mensagem = ['mensagem_cadastro' => "Curso cadastrado!"];

			//Loading View
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos();
			$this->session->set_flashdata('cursos', $cursos);
			$this->load->view('cadastro_curso', $mensagem);
		}
	}
}
?>