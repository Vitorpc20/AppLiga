<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastraPartida extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function Index()
	{
		$this->load->model('Partida_model');
		$partidas = $this->Partida_model->listarPartidas();
		$this->session->set_flashdata('partidas', $partidas);
		$this->load->view('cadastro_partida');

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos();
		$this->session->set_flashdata('cursos', $cursos);
	}
	public function cadastra()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('modalidade', 'Modalidade', 'required');

		$this->form_validation->set_rules('data', 'Data', 'required');

		$this->form_validation->set_rules('horario', 'Horário', 'required');

		$this->form_validation->set_rules('curso1', 'Curso 1', 'required');

		$this->form_validation->set_rules('curso2', 'Curso 2', 'required|callback_diff_cursos');

		$this->form_validation->set_rules('resultado1', 'Resultado 1', '');

		$this->form_validation->set_rules('resultado2', 'Resultado 2', '');


		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->view('cadastro_partida', $mensagem);
		} else {
			$data = array(
			'cod_campeonato' => '1',
			'modalidade' => $this->input->post('modalidade'),
			'data' => $this->input->post('data'),
			'horario' => $this->input->post('horario'),
			'curso1' => $this->input->post('curso1'),
			'curso2' => $this->input->post('curso2'),
			'resultado1' => $this->input->post('resultado1'),
			'resultado2' => $this->input->post('resultado2'));
			//Transfering data to Model

			$this->load->model("Partida_model");
			$this->Partida_model->inserePartida($data);
			$mensagem = ['mensagem_cadastro' => "Partida cadastrada!"];

			//Loading View
			$this->load->model('Partida_model');
			$partidas = $this->Partida_model->listarPartidas();
			$this->session->set_flashdata('partidas', $partidas);
			$this->load->view('cadastro_partida', $mensagem);

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos();
			$this->session->set_flashdata('cursos', $cursos);
		}
	}
	public function diff_cursos()
    {
        if ($this->input->post('curso1') == $this->input->post('curso2'))
        {
            $this->form_validation->set_message('diff_cursos', 'Os cursos devem ser diferentes.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function remove()
    {
    	$data = $this->uri->segment(3);
		$data = rawurldecode($data);

		$this->load->model('Partida_model');
		$this->Partida_model->deletarPartida($data);
		$mensagem = ['mensagem_excluido' => "Partida excluída!"];

		$this->load->model('Partida_model');
		$partidas = $this->Partida_model->listarPartidas();
		$this->session->set_flashdata('partidas', $partidas);
		$this->load->view('cadastro_partida', $mensagem);

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos();
		$this->session->set_flashdata('cursos', $cursos);
    }

    public function atualiza()
    {
    	$data = $this->uri->segment(3);
		$data = rawurldecode($data);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('modalidade', 'Modalidade', 'required');

		$this->form_validation->set_rules('data', 'Data', 'required');

		$this->form_validation->set_rules('horario', 'Horário', 'required');

		$this->form_validation->set_rules('curso1', 'Curso 1', 'required');

		$this->form_validation->set_rules('curso2', 'Curso 2', 'required|callback_diff_cursos');

		$this->form_validation->set_rules('resultado1', 'Resultado 1', '');

		$this->form_validation->set_rules('resultado2', 'Resultado 2', '');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->view('cadastro_partida', $mensagem);
		} else {
			$partida = array(
			'cod_campeonato' => '1',
			'modalidade' => $this->input->post('modalidade'),
			'data' => $this->input->post('data'),
			'horario' => $this->input->post('horario'),
			'curso1' => $this->input->post('curso1'),
			'curso2' => $this->input->post('curso2'),
			'resultado1' => $this->input->post('resultado1'),
			'resultado2' => $this->input->post('resultado2'));
			//Transfering data to Model

			$this->load->model("Partida_model");
			$this->Partida_model->atualizaPartida($partida, $data);
			$mensagem = ['mensagem_cadastro' => "Partida atualizada!"];

			//Loading View
			$this->load->model('Partida_model');
			$partidas = $this->Partida_model->listarPartidas();
			$this->session->set_flashdata('partidas', $partidas);
			$this->load->view('cadastro_partida', $mensagem);

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos();
			$this->session->set_flashdata('cursos', $cursos);
		}
    }
}
?>