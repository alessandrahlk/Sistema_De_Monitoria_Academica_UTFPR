<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N_bolsas extends CI_Controller {

	public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==false){
			redirect('login_ldap');
		}
	}


	public function index($indice=null)
	{
		$this->load->model('bolsa_model','bolsa'); // carrega o modelo Bolsas_model
		$dados['n_bolsas'] = $this->bolsa->get_bolsas(); // passa os dados da tabela n_bolsas no array $dados

		$this->load->view('includes/header');
		$this->load->view('includes/menu_deped');
		$this->load->view('n_bolsas',$dados); // passa $dados para a view n_bolsas

		if($indice==1){
			$data['msg'] = "Dados inseridos com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}else if($indice==2){
			$data['msg'] = "Erro: dados já inseridos. Utilize o comando Atualizar.";
			$this->load->view('includes/erro',$data);}

			$this->load->view('includes/footer');
		}

		public function salvar($id=null){
			$this->load->model('bolsa_model','bolsa');
			if($this->bolsa->salvar()){ //insert ou update no banco
				redirect('n_bolsas/1');
			}
			else {
				redirect('n_bolsas/2');}
			}

		}
