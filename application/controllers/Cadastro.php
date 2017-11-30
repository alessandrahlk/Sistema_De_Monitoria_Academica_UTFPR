<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function index($indice=null) // para funcionar, os índices devem ser configurados no arquivo application/config/routes.php
	{

		$this->load->view('includes/header');
							$this->load->view('includes/menu');
							$this->load->view('cadastro');
							if($indice==1){
								$data['msg'] = "Cadastro realizado com sucesso, aguarde a liberação do seu login.";
								$this->load->view('includes/sucesso',$data);
							}else if($indice==2){
								$data['msg'] = "Erro: usuário já existe, aguarde a liberação do seu login.";
								$this->load->view('includes/erro',$data);
							}

							$this->load->view('includes/footer');
						}

						public function inserir()
						{
							$this->load->model('usuario_model','usuario'); // a classe Usuario_model é utilizada dentro deste método como usuario
							if($this->usuario->inserir()){
								redirect('cadastro/1');
							}else{
								redirect('cadastro/2');
							}
						}


					}
