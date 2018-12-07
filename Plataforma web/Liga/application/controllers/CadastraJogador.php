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
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

		$this->load->model('Jogador_model');
		$jogadores = $this->Jogador_model->listarJogadores();
		$this->session->set_flashdata('jogadores', $jogadores);
		
		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursos', $cursos);

		$this->load->view('cadastro_jogador');
	}
	public function cadastra()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome_jogador', 'Nome', 'required');

		$this->form_validation->set_rules('curso_jogador', 'Curso', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->model('Jogador_model');
			$jogadores = $this->Jogador_model->listarJogadores();
			$this->session->set_flashdata('jogadores', $jogadores);
			$this->load->view('cadastro_jogador', $mensagem);	
		} else {
			$data = array(
			'nome' => $this->input->post('nome_jogador'),
			'curso' => $this->input->post('curso_jogador'));
			//Transfering data to Model

			$jogador = $this->input->post('nome_jogador');

			$this->load->model("Jogador_model");
			$query = $this->Jogador_model->selecionaJogador($jogador);

			if(!$query){

				$this->load->model("Jogador_model");
				$this->Jogador_model->insereJogador($data);
				$mensagem = ['mensagem_cadastro' => "Jogador cadastrado!"];

				//Loading View
				$this->load->model('Jogador_model');
				$jogadores = $this->Jogador_model->listarJogadores();
				$this->session->set_flashdata('jogadores', $jogadores);

				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursos', $cursos);

				$this->load->view('cadastro_jogador', $mensagem);
			}else{
				$mensagem = ['mensagem_erro' => "Ja existe o jogador: ".$jogador."!"];
				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursos', $cursos);

				$this->load->model('Jogador_model');
				$jogadores = $this->Jogador_model->listarJogadores();
				$this->session->set_flashdata('jogadores', $jogadores);
				$this->load->view('cadastro_jogador', $mensagem);
			}
		}
	}

	public function remove()
	{
		$jogador = $this->uri->segment(3);
		$jogador = rawurldecode($jogador);
		$campeonato = $this->uri->segment(4);
		$campeonato = rawurldecode($campeonato);

		$this->load->model('Jogador_model');
		$this->Jogador_model->deletarJogador($jogador);
		$mensagem = ['mensagem_cadastro' => "Jogador excluído!"];

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursos', $cursos);

		$this->load->model('Jogador_model');
		$jogadores = $this->Jogador_model->listarJogadores();
		$this->session->set_flashdata('jogadores', $jogadores);
		$this->load->view('cadastro_jogador', $mensagem);
	}

	public function atualizar()
	{
		$campeonato = $this->uri->segment(4);
		$campeonato = rawurldecode($campeonato);
		$data_id = $this->uri->segment(3);

		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nome_jogador', 'Nome', 'required');

		$this->form_validation->set_rules('curso_jogador', 'Curso', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->model('Jogador_model');
			$jogadores = $this->Jogador_model->listarJogadores();
			$this->session->set_flashdata('jogadores', $jogadores);
			$this->load->view('cadastro_jogador');	
		} else {
			
			$nome = $this->input->post('nome_jogador');
			$curso = $this->input->post('curso_jogador');
			//Transfering data to Model

			$this->load->model("Jogador_model");
			$query = $this->Jogador_model->selecionaJogador($nome);

			if(!$query){
				$this->load->model("Jogador_model");
				$this->Jogador_model->atualiza($nome, $curso, $data_id);


				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursos', $cursos);

				$this->load->model('Jogador_model');
				$jogadores = $this->Jogador_model->listarJogadores();
				$this->session->set_flashdata('jogadores', $jogadores);
				$this->load->view('cadastro_jogador');	
			}else{
				$mensagem = ['mensagem_erro' => "Ja existe o jogador: ".$nome."!"];
				$this->load->model('Curso_model');
				$cursos = $this->Curso_model->listarCursos($campeonato);
				$this->session->set_flashdata('cursos', $cursos);

				$this->load->model('Jogador_model');
				$jogadores = $this->Jogador_model->listarJogadores();
				$this->session->set_flashdata('jogadores', $jogadores);
				$this->load->view('cadastro_jogador', $mensagem);
			}
		}
	}
}
?>