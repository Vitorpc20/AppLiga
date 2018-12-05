<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	// Encaminha para os menus laterais
	public function index()
	{
		$this->load->view('index');
	}
	public function campeonatos()
	{
		$this->load->model('Campeonato_model');
		$campeonatos = $this->Campeonato_model->listarCampeonatos();
		$this->session->set_flashdata('campeonatos', $campeonatos);
		$this->load->view('campeonatos', $campeonatos);
	}
	public function gerencia_campeonato()
	{
		$data = $this->uri->segment(3);
		$data = rawurldecode($data);

		$this->load->model('Campeonato_model');
		$campeonato = $this->Campeonato_model->buscaCampeonatos($data);
		$this->session->set_userdata('campeonato', $campeonato);
		$this->load->view('gerencia_campeonato', $campeonato);
	}
}
?>
