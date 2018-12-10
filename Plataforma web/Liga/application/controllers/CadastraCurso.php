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
		$cursos = $this->Curso_model->listarTodosCursos();
		$this->session->set_flashdata('cursos', $cursos);
		$this->load->view('cadastro_curso');
	}
	public function cadastra()
	{
		
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nome_curso', 'Nome', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model("Curso_model");
			$cursos = $this->Curso_model->listarTodosCursos();
			$this->session->set_flashdata('cursos', $cursos);
			$this->load->view('cadastro_curso', $mensagem);
		} else {
			$data = array(
			'nome' => $this->input->post('nome_curso'));
			//Transfering data to Model

			$this->load->model("Curso_model");
			$query = $this->Curso_model->selecionaCurso($data);
			if(!$query){
				$this->load->model("Curso_model");
				$this->Curso_model->insereCurso($data);
				$mensagem = ['mensagem_cadastro' => "Curso cadastrado!"];


				//Loading View
				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarTodosCursos();
				$this->session->set_flashdata('cursos', $cursos);
				$this->load->view('cadastro_curso', $mensagem);
			}else{
				$mensagem = ['mensagem_erro' => "Já existe o curso: ".$data['nome']."!"];
				$this->load->model("Curso_model");
				$cursos = $this->Curso_model->listarTodosCursos();
				$this->session->set_flashdata('cursos', $cursos);
				$this->load->view('cadastro_curso', $mensagem);
			}
		}
	}
	public function remove()
	{
		$data = $this->uri->segment(3);
		$data = rawurldecode($data);

		$this->load->model('Curso_model');
		$this->Curso_model->deletarCurso($data);
		$mensagem = ['mensagem_excluido' => "Curso excluído!"];

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarTodosCursos();
		$this->session->set_flashdata('cursos', $cursos);
		$this->load->view('cadastro_curso', $mensagem);
	}

	public function selecionar()
	{
		$data = $this->uri->segment(3);
		$data = rawurldecode($data);
		echo $data;

		$this->load->model('Curso_model');
		$curso = $this->Curso_model->selecionaCurso($data);
		echo $curso;
		$this->session->set_flashdata('curso', $curso);
	}

	public function atualizar()
	{
		$velho = $this->uri->segment(3);
		$velho = rawurldecode($velho);

		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nome_curso', 'Nome', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarTodosCursos();
			$this->session->set_flashdata('cursos', $cursos);
			$this->load->view('cadastro_curso', $mensagem);
		} else {
			$data = array(
				'nome' => $this->input->post('nome_curso')
			);

			$this->load->model("Curso_model");
			$query = $this->Curso_model->selecionaCurso($data);

			if(!$query){
				//Transfering data to Model

				$this->load->model("Curso_model");

				$this->Curso_model->atualiza($this->input->post('nome_curso'), $velho);
				$mensagem = ['mensagem_cadastro' => "Curso atualizado!"];

				//Loading View
				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarTodosCursos();
				$this->session->set_flashdata('cursos', $cursos);
				$this->load->view('cadastro_curso', $mensagem);
			}else{
				$mensagem = ['mensagem_erro' => "Já existe o curso: ".$data['nome']."!"];
				$this->load->model("Curso_model");
				$cursos = $this->Curso_model->listarTodosCursos();
				$this->session->set_flashdata('cursos', $cursos);
				$this->load->view('cadastro_curso', $mensagem);
			}
		}
	}
	public function curso_campeonato()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

		$this->load->model('Curso_model');
		$cursosTodos = $this->Curso_model->listarTodosCursos();
		$cursosAtuais = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursosAtuais', $cursosAtuais);
		$this->session->set_flashdata('cursosTodos', $cursosTodos);
		$this->load->view('curso_campeonato');
	}
	public function adicionaCursoCampeonato()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('curso', 'Nome', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Curso_model');
			$cursosTodos = $this->Curso_model->listarTodosCursos();
			$cursosAtuais = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursosAtuais', $cursosAtuais);
			$this->session->set_flashdata('cursosTodos', $cursosTodos);
			$this->load->view('curso_campeonato', $mensagem);
		} else {

			$data = array(
				'curso' => $this->input->post('curso'),
				'cod_campeonato' => $campeonato,
				'pontuacao' => 0
			);

			$this->load->model("Curso_model");
			$query = $this->Curso_model->selecionaCursoCampeonato($data, $campeonato);

			if(!$query){
				$this->load->model("Curso_model");
				$this->Curso_model->adiciona($data);
				$mensagem = ['mensagem_adiciona' => "Curso adicionado!"];


				$this->load->model('Curso_model');
				$cursosTodos = $this->Curso_model->listarTodosCursos();
				$cursosAtuais = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursosAtuais', $cursosAtuais);
				$this->session->set_flashdata('cursosTodos', $cursosTodos);
				$this->load->view('curso_campeonato', $mensagem);
			}else{
				$mensagem = ['mensagem_erro' => "Curso já existente no campeonato!"];
				$this->load->model('Curso_model');
				$cursosTodos = $this->Curso_model->listarTodosCursos();
				$cursosAtuais = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursosAtuais', $cursosAtuais);
				$this->session->set_flashdata('cursosTodos', $cursosTodos);
				$this->load->view('curso_campeonato', $mensagem);
			}
		}
	}

	public function removeCursoCampeonato()
	{
		$curso = $this->uri->segment(3);
		$curso = rawurldecode($curso);
		$campeonato = $this->uri->segment(4);
		$campeonato = rawurldecode($campeonato);

		$data = array(
				'curso' => $curso,
				'cod_campeonato' => $campeonato
			);

		$this->load->model('Curso_model');
		$this->Curso_model->removeCursoCampeonato($data);
		$mensagem = ['mensagem_removido' => "Curso removido!"];

		$this->load->model('Curso_model');
		$cursosTodos = $this->Curso_model->listarTodosCursos();
		$cursosAtuais = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursosAtuais', $cursosAtuais);
		$this->session->set_flashdata('cursosTodos', $cursosTodos);
		$this->load->view('curso_campeonato', $mensagem);
	}
}
?>