<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login','');
	}
	public function validaLogin()
	{
    $this->load->library('form_validation');

    $usuario = $this->input->post('usuario_acesso');
    $senha = $this->input->post('senha_acesso'); 

    $this->form_validation->set_rules('usuario_acesso', 'Usuário', 'required');
    $this->form_validation->set_rules('senha_acesso', 'Senha', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data = array('mensagem_erro' => validation_errors());
      $this->load->view('login', $data);
    } else {
      if($usuario == 'LigaDesportiva' && $senha == 'Liga123456'){
        $this->load->view('index');
      } 
      else {
        $data['messagem_erro'] = 'Usuário ou Senha inválidos!';
        $this->load->view('login', $data);
      }
    }
	}
}    
?>
