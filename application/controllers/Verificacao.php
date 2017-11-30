<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verificacao extends CI_Controller {

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

		$this->load->model('bolsa_model','bolsa'); // carrega Bolsa_model
		$dados['n_bolsas'] = $this->bolsa->get_bolsas(); // obtém dados da tabela n_bolsas

		$this->load->model('verificar_model','verificar'); // carrega Verifica_model
		$dados['aprovacao'] = $this->verificar->get_aprovacao(); // obtém dados da tabela aprovacao

		$this->db->select('*');
		$dados['disciplina'] = $this->db->get('disciplina')->result(); // obtém dados da tabela disciplina

		$this->db->select('codigo_eq');
		$this->db->select('disciplina');
		$dados['coluna1'] = $this->db->get('disciplina_equivalente')->result();

		$this->db->group_by('codigo_eq');
    $this->db->select('codigo_eq');
    $this->db->select('disciplina');
    $dados['disciplina_equivalente'] = $this->db->get('disciplina_equivalente')->result();

		$this->db->select('*');
		$dados['pre_requisito'] = $this->db->get('pre_requisito')->result(); // obtém dados da tabela pre_requisito

		$this->load->view('includes/header'); // carrega as views
		if($this->session->has_userdata('logado')==false)
		$this->load->view('includes/menu');
		else{
		$verifica =  $this->session->userdata('tipo');
		if($verifica == 1){
			$this->load->view('includes/menu_coor');}
			else if($verifica == 2){
				$this->load->view('includes/menu_chefdep');}
				else if($verifica == 3){
					$this->load->view('includes/menu_chefdep');
				}
				else if($verifica == 4){
					$this->load->view('includes/menu_deped');}
					else if($verifica == 5){
						$this->load->view('includes/menu_aluno');}
					else if($verifica == 11){
						$this->load->view('includes/menu_admin');}
						else{
							$this->load->view('includes/menu');}}



							$this->load->view('verificacao',$dados); // passa o array $dados para a view verificacao
							if($indice==1){ // mensagens de erro ou sucesso
								$data['msg'] = "Aprovação/Reprovação realizada com sucesso.";
								$this->load->view('includes/sucesso',$data);}
								if($indice==2){
									$data['msg'] = "Erro.";
									$this->load->view('includes/erro',$data);}

									$this->load->model('Usuario_model','user');
									$v = $this->user->verifica_data_chefdep();
									if($v == 1){} // se passou o prazo, não mostra a parte para aprovar/reprovar
										else{
									if($verifica == 2){$this->load->view('aprovacao');}
									else if($verifica == 3){$this->load->view('aprovacao');}}

									$this->load->view('includes/footer');
								}

								public function salvar_chefdep($id=null){

									$this->load->model('verificar_model','verifica');
									if($this->verifica->salvar_chefdep()){ // salva a aprovação ou reprovação do chefe de departamento ou diretoria de graduação
										redirect('verificacao/1');
									}
									else redirect('verificacao/2');

								}

							}
