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
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

		$this->load->model('Partida_model');
		$partidas = $this->Partida_model->listarPartidas($campeonato);
		$this->session->set_flashdata('partidas', $partidas);

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursos', $cursos);

		$this->load->view('cadastro_partida');
	}
	public function cadastra()
	{
		$campeonato = $this->uri->segment(3);
		$campeonato = rawurldecode($campeonato);

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
			//Loading View
			$this->load->model('Partida_model');
			$partidas = $this->Partida_model->listarPartidas($campeonato);
			$this->session->set_flashdata('partidas', $partidas);
			
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->view('cadastro_partida', $mensagem);
		} else {

			$data = array(
			'cod_campeonato' => $campeonato,
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
			$partidas = $this->Partida_model->listarPartidas($campeonato);
			$this->session->set_flashdata('partidas', $partidas);
			
			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->view('cadastro_partida', $mensagem);
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
		$campeonato = $this->uri->segment(4);
		$campeonato = rawurldecode($campeonato);

		$this->load->model('Partida_model');
		$this->Partida_model->deletarPartida($data);
		$mensagem = ['mensagem_excluido' => "Partida excluída!"];

		$this->load->model('Partida_model');
		$partidas = $this->Partida_model->listarPartidas($campeonato);
		$this->session->set_flashdata('partidas', $partidas);

		$this->load->model('Curso_model');
		$cursos = $this->Curso_model->listarCursos($campeonato);
		$this->session->set_flashdata('cursos', $cursos);

		$this->load->view('cadastro_partida', $mensagem);
    }

    public function removeJogador(){
    	$cod_jogo = $this->uri->segment(3);
		$cod_jogo = rawurldecode($cod_jogo);
		$jogador = $this->uri->segment(4);
		$jogador = rawurldecode($jogador);

		$this->load->model('Jogador_model');
		$this->Jogador_model->removeJogadorPartida($cod_jogo, $jogador);
		$mensagem = ['mensagem_cadastro' => "Jogador removido da partida!"];

		$this->load->model('Partida_model');
		$partida = $this->Partida_model->selecionaPartida($cod_jogo);
		$this->session->set_flashdata('partida', $partida);

		foreach ($partida AS $jogo)
		
		$this->load->model('Jogador_model');
		$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

		$this->load->model('Jogador_model');
		$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

		$this->load->view('partida_jogador', $mensagem);

    }

    public function atualiza()
    {
    	$data = $this->uri->segment(3);
		$data = rawurldecode($data);
		$campeonato = $this->uri->segment(4);
		$campeonato = rawurldecode($campeonato);

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
			$this->load->model('Partida_model');
			$partidas = $this->Partida_model->listarPartidas($campeonato);
			$this->session->set_flashdata('partidas', $partidas);

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);
			$this->load->view('cadastro_partida', $mensagem);
		} else {
			$partida = array(
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
			$partidas = $this->Partida_model->listarPartidas($campeonato);
			$this->session->set_flashdata('partidas', $partidas);

			$this->load->model('Curso_model');
			$cursos = $this->Curso_model->listarCursos($campeonato);
			$this->session->set_flashdata('cursos', $cursos);

			$this->load->view('cadastro_partida', $mensagem);
		}
    }

    public function Visualizar()
    {
    	$data = $this->uri->segment(3);
		$data = rawurldecode($data);

		$this->load->model('Partida_model');
		$partida = $this->Partida_model->selecionaPartida($data);
		$this->session->set_flashdata('partida', $partida);
		$this->load->view('partida_jogador');
    }

    public function pesquisa()
    {
    	 if (isset($_GET['term'])) {
    	 	$this->load->model('Jogador_model');
            $result = $this->Jogador_model->buscaAuto($_GET['term']);
            if (count($result) > 0) {
	            foreach ($result as $row)
	            $arr_result[] = $row->nome;
	            echo json_encode($arr_result);
            }
        }
    }

	public function partida_jogador(){

		$cod_jogo = $this->uri->segment(3);
		$cod_jogo = rawurldecode($cod_jogo);

		$this->load->model('Partida_model');
		$partida = $this->Partida_model->selecionaPartida($cod_jogo);
		$this->session->set_flashdata('partida', $partida);

		foreach ($partida AS $jogo)

		$this->load->model('Jogador_model');
		$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

		$this->load->model('Jogador_model');
		$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida2', $jogador_partida2);


		$this->load->view('partida_jogador');

	}

	public function insereJogador()
    {
    	$cod_jogo = $this->uri->segment(3);
		$cod_jogo = rawurldecode($cod_jogo);
		$curso = $this->uri->segment(4);
		$curso = rawurldecode($curso);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome_jogador', 'Nome', 'required');

		$this->form_validation->set_rules('numero_jogador', 'Curso', 'required');

		if ($this->form_validation->run() == FALSE) {
			$mensagem = array('mensagem_erro' => validation_errors());
			$this->load->model('Partida_model');
			$partida = $this->Partida_model->selecionaPartida($cod_jogo);
			$this->session->set_flashdata('partida', $partida);

			foreach ($partida AS $jogo)
			
			$this->load->model('Jogador_model');
			$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
			$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

			$this->load->model('Jogador_model');
			$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
			$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

			$this->load->view('partida_jogador', $mensagem);
		}else{
			$this->load->model('Jogador_model');
			$jogador = $this->input->post('nome_jogador');
			$cod_jogador = $this->Jogador_model->selecionaJogador($jogador);

			if($cod_jogador){
				foreach ($cod_jogador as $value)

				$this->load->model('Jogador_model');
				$query = $this->Jogador_model->selecionaJogadorCurso($value['cod_jogador'], $curso);
				if($query){
					

					$novo_jogador_partida = array(
						'cod_jogo' => $cod_jogo,
						'cod_jogador' => $value['cod_jogador'],
						'numero' => $this->input->post('numero_jogador')
					);

					$this->load->model('Jogador_model');
					$this->Jogador_model->insereJogadorPartida($novo_jogador_partida);

					$mensagem = ['mensagem_cadastro' => "Jogador inserido!"];

					$this->load->model('Partida_model');
					$partida = $this->Partida_model->selecionaPartida($cod_jogo);
					$this->session->set_flashdata('partida', $partida);

					foreach ($partida AS $jogo)
					
					$this->load->model('Jogador_model');
					$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
					$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

					$this->load->model('Jogador_model');
					$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
					$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

					$this->load->view('partida_jogador', $mensagem);
				}else{
					$mensagem = ['mensagem_erro' => "Jogador não pertence a este curso!"];

					$this->load->model('Partida_model');
					$partida = $this->Partida_model->selecionaPartida($cod_jogo);
					$this->session->set_flashdata('partida', $partida);

					foreach ($partida AS $jogo)
					
					$this->load->model('Jogador_model');
					$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
					$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

					$this->load->model('Jogador_model');
					$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
					$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

					$this->load->view('partida_jogador', $mensagem);
				}
			}else{
				$mensagem = ['mensagem_erro' => "Jogador não cadastrado no banco de dados!"];

				$this->load->model('Partida_model');
				$partida = $this->Partida_model->selecionaPartida($cod_jogo);
				$this->session->set_flashdata('partida', $partida);

				foreach ($partida AS $jogo)
				
				$this->load->model('Jogador_model');
				$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
				$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

				$this->load->model('Jogador_model');
				$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
				$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

				$this->load->view('partida_jogador', $mensagem);
			}
		}
    }

    public function atualizaJogadorPartida()
    {
    	$cod_jogo = $this->uri->segment(3);
		$cod_jogo = rawurldecode($cod_jogo);

    	if(isset($_POST)){
    		if(isset($_POST["numero1"])){
				$i = 0;
			    foreach($_POST["numero1"] AS $data)
			    {
			    	$jogadoresC1[$i] = array (
			    		'cod_jogador' => $_POST["cod_jogador1"][$i],
			    		'numero' => $_POST["numero1"][$i],
			    		'pontuacao' => $_POST["pontos1"][$i]
			    	);
			    	$i++;
			    };
			    $this->load->model('Jogador_model');
				$this->Jogador_model->atualizaJogadorPartida($jogadoresC1);
			 };
			 if(isset($_POST["numero2"])){
			    $i = 0;
			    foreach($_POST["numero2"] AS $data)
			    {
			    	$jogadoresC2[$i] = array (
			    		'cod_jogador' => $_POST["cod_jogador2"][$i],
			    		'numero' => $_POST["numero2"][$i],
			    		'pontuacao' => $_POST["pontos2"][$i]
			    	);
			    	$i++;
			    };
			    $this->load->model('Jogador_model');
				$this->Jogador_model->atualizaJogadorPartida($jogadoresC2);
			};
		};

		
		#ATUALIZA PLACAR E MVP

		$nome_jogador = $this->input->post('nome_mvp');

		$this->load->model('Jogador_model');
		$cod_jogador = $this->Jogador_model->selecionaJogador($nome_jogador);

		if($cod_jogador){
			foreach ($cod_jogador AS $codigo){
			$dados_partida = array(
				'resultado1' => $this->input->post('resultado1'),
				'resultado2' => $this->input->post('resultado2'),
				'mvp' => $codigo['cod_jogador'],
				'nomemvp' => $nome_jogador
				);
			};
		}else{
			$dados_partida = array(
				'resultado1' => $this->input->post('resultado1'),
				'resultado2' => $this->input->post('resultado2')
				);
		}


		$this->load->model('Partida_model');
		$partida = $this->Partida_model->atualizaPartida($dados_partida, $cod_jogo);

		#CARREGA A PAGINA
		$this->load->model('Partida_model');
		$partida = $this->Partida_model->selecionaPartida($cod_jogo);
		$this->session->set_flashdata('partida', $partida);

		foreach ($partida AS $jogo)

		$this->load->model('Jogador_model');
		$jogador_partida1 = $this->Jogador_model->selecionaJogadorPartidaTime1($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida1', $jogador_partida1);

		$this->load->model('Jogador_model');
		$jogador_partida2 = $this->Jogador_model->selecionaJogadorPartidaTime2($cod_jogo, $jogo);
		$this->session->set_flashdata('jogador_partida2', $jogador_partida2);

		$this->load->view('partida_jogador');
    }
}
?>