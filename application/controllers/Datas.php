<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datas extends CI_Controller {

	public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==false){
			redirect('login_ldap');
		}
	}

	public function index($indice=null)
	{

		$this->load->model('data_model','data');
		$dados['datas'] = $this->data->get_datas(); // pega os dados da tabela datas pela função get_datas() do Data_model

		$this->load->view('includes/header');
		$this->load->view('includes/menu_deped');
		$this->load->view('datas',$dados); // passa o array $dados para a view

		if($indice==1){
			$data['msg'] = "Datas inseridas com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}
		if($indice==2){
			$data['msg'] = "Datas atualizadas com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}

		$this->load->view('includes/footer');

	}

	public function salvar($id=null){

		$this->load->model('data_model','data');
		if($this->data->salvar()){ // da insert ou replace na tabela datas
			redirect('datas/1');
		}
		else redirect('datas/2');

	}



}
