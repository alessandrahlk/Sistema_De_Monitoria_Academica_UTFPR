<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_aluno extends CI_Controller {

	public function index($indice=null) // para funcionar, os índices devem ser configurados no arquivo application/config/routes.php
	{

		$this->load->view('includes/header');
		$verifica =  $this->session->userdata('tipo'); // conforme o tipo de usuário, mostra diferentes opções no menu

							$this->load->view('includes/menu');
							$this->load->view('cadastro_aluno');
							if($indice==1){
								$data['msg'] = "Cadastro realizado com sucesso, realize o login.";
								$this->load->view('includes/sucesso',$data);
							}else if($indice==2){
								$data['msg'] = "Erro: usuário já existe, realize o login.";
								$this->load->view('includes/erro',$data);
							}

							$this->load->view('includes/footer');
						}

						public function inserir()
						{
							$this->load->model('usuario_model','usuario'); // a classe Usuario_model é utilizada dentro deste método como usuario
							if($this->usuario->inserir_aluno()){
								redirect('cadastro_aluno/1');
							}else{
								redirect('cadastro_aluno/2');
							}
						}


					}
