<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends CI_Controller {

	public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==false){
			redirect('login_ldap');
		}
	}

	public function index($indice=null)
  {

		$this->load->model('data_model','data'); // carrega Data_model
		$dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas
    $user = $this->session->userdata('login');

    $this->db->select("login");
    $this->db->select("media");
    $this->db->select("disciplina");
    $this->db->order_by("media", "asc");
    $dados['classificacao'] = $this->db->get('inscricao')->result();

		$this->load->view('includes/header');
		$this->load->view('includes/menu_aluno');

		$this->load->view('classificacao',$dados); // passa o array $dados para a view


		$this->load->view('includes/footer');

	}

}
