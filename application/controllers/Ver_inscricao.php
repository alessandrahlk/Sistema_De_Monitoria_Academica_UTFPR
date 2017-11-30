<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ver_inscricao extends CI_Controller {

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

		$this->db->where("login",$user);
		$dados['inscricoes_user'] = $this->db->get('inscricao')->result(); //

    $this->db->select("*");
    $dados['inscricoes'] = $this->db->get('inscricao')->result(); // 

		$this->load->view('includes/header');
		$this->load->view('includes/menu_aluno');

		$this->load->view('ver_inscricao',$dados); // passa o array $dados para a view

		if($indice==1){
			$data['msg'] = "Inscrição realizada com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}else if($indice==2){
			$data['msg'] = "Erro.";
			$this->load->view('includes/erro',$data);
		}
    if($indice==3){
      $data['msg'] = "Inscrição excluída com sucesso.";
      $this->load->view('includes/sucesso',$data);
    }else if($indice==4){
      $data['msg'] = "Erro ao excluir.";
      $this->load->view('includes/erro',$data);
    }

		$this->load->view('includes/footer');

	}

public function excluir(){
  $this->load->model('Inscricao_model','ins');
  if($this->ins->excluir())
  redirect('ver_inscricao/3');
  else
    redirect('ver_inscricao/4');

}
}
