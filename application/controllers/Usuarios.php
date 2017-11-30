<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); // não mostra os warnings
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==false){
			redirect('login_ldap');
		}
	}

	public function index($indice=null)
	{
		$this->load->model('usuario_model','usuario'); // carrega o modelo Usuario_model

		$dados['dadosuser'] = $this->usuario->get_usuarios(); // obtém dados da tabela usuário
		$dados['dadoscoor'] = $this->usuario->get_coor(); // obtém dados da tabela coordenacao

		$this->load->view('includes/header');
		$this->load->view('includes/menu_admin');
		$this->load->view('usuarios',$dados); // passa array $dados para a view usuarios

		if($indice==1){ // mensagens de sucesso e erro
			$data['msg'] = "Usuários excluído com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}else if($indice==2){
			$data['msg'] = "Erro: não foi possível excluir usuário (existe alguma dependência no banco).";
			$this->load->view('includes/erro',$data);}
			else if($indice==3){
				$data['msg'] = "Usuário atualizado com sucesso";
				$this->load->view('includes/sucesso',$data);
			}
			else if($indice==4){
				$data['msg'] = "Erro: não foi possível atualizar o usuário (existe alguma dependência no banco).";
				$this->load->view('includes/erro',$data);
			}
			else if($indice==5){
				$data['msg'] = "Coordenador adicionado com sucesso.";
				$this->load->view('includes/sucesso',$data);
			}
			else if($indice==6){
				$data['msg'] = "Erro: não foi possível adicionar coordenador, já existe coordenador no departamento.";
				$this->load->view('includes/erro',$data);
			}
			else if($indice==7){
				$data['msg'] = "Coordenador excluído com sucesso.";
				$this->load->view('includes/sucesso',$data);
			}
			else if($indice==8){
				$data['msg'] = "Erro ao excluir coordenador.";
				$this->load->view('includes/erro',$data);
			}

			$this->load->view('includes/footer');
		}

		public function excluir($id=null){
			$this->load->model('usuario_model','usuario');
			if($this->usuario->excluir($id)) // deleta o usuário com o login correspondente
			redirect('usuarios/1'); // mostra a mensagem conforme o redirect
			else
			redirect('usuarios/2');
		}

		public function atualizar($id=null){ // para atualizar as informações, carrega novas views
			$this->db->where('login',$id);
			$data['usuario'] = $this->db->get('usuario')->result(); // obtém dados do usuário de login = $id
			$this->load->view('includes/header');
			$this->load->view('includes/menu_admin');
			$this->load->view('editar_usuario',$data);
			$this->load->view('includes/footer');
		}

		public function salvar_atualizacao(){
			$this->load->model('usuario_model','usuario');
			if($this->usuario->salvar_atualizacao()){ // uptade o usuário com o login correspondente
				redirect('usuarios/3');
			}
			else {
				redirect('usuarios/4');}
			}

			public function adicionar_coordenador($id=null){ // adiciona na tabela coordenacao
				$this->load->model('usuario_model','usuario');
				if($this->usuario->add_coordenador($id)){
					redirect('usuarios/5');
				}else {
					redirect('usuarios/6');
				}

			}

			public function excluir_coordenador($id=null){ // exclui da tabela coordenacao
				$this->load->model('usuario_model','usuario');
				if($this->usuario->excluir_coor($id)){
					redirect('usuarios/7');
				}else{
					redirect('usuarios/8');
				}


			}



		}
