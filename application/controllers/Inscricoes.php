<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricoes extends CI_Controller {

	public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==false){
			redirect('login_ldap');
		}
		
	$this->load->model('usuario_model','user');
    $this->user->verifica_data(); // verifica se está dentro do prazo
	}

	public function index($indice=null)
  {

		$this->load->model('data_model','data'); // carrega Data_model
		$dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

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

		$this->load->view('includes/header');
		$this->load->view('includes/menu_aluno');

		$this->load->view('inscricoes',$dados); // passa o array $dados para a view

		if($indice==1){
			$data['msg'] = "Inscrição realizada com sucesso.";
			$this->load->view('includes/sucesso',$data);
		}else if($indice==2){
			$data['msg'] = "Erro.";
			$this->load->view('includes/erro',$data);
		}

		$this->load->view('includes/footer');

	}

	public function escolha_disciplina($id=null){
		$this->load->model('data_model','data'); // carrega o modelo Data_model
		$data['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

		$this->db->where('codigo',$id);
		$data['disciplina'] = $this->db->get('disciplina')->result(); // procura os dados da disciplina com código $id

		$this->db->group_by('codigo_eq');
		$this->db->select('codigo_eq');
		$this->db->select('nome_eq');
		$this->db->select('disciplina');
		$this->db->where('disciplina',$id);
		$data['disciplina_equivalente'] = $this->db->get('disciplina_equivalente')->result();

		$this->load->view('includes/header');
		$this->load->view('includes/menu_aluno');
		$this->load->view('escolha_disciplina',$data); // passa o array $data para a view adicionar_equivalente

		$this->load->view('includes/footer');
	}


	public function adicionar_notas(){

		$this->load->model('Inscricao_model','inscricao');
		$dados = $this->inscricao->adicionar_notas();

		$this->db->where('codigo',$dados['disciplina']);
		$this->db->select('nome');
		$dados['nome_disciplina'] = $this->db->get('disciplina')->result();

		$this->db->group_by('codigo_eq');
		$this->db->where('codigo_eq',$dados['codigo']);
		$this->db->where('disciplina',$dados['disciplina']);
		$this->db->select('nome_eq');
		$dados['nome_equivalente'] = $this->db->get('disciplina_equivalente')->result();

		if($dados['codigo'] == ""){
			$this->db->where('codigo_disciplina',$dados['disciplina']);
			$this->db->select('codigo_pre');
			$this->db->select('nome_pre');
			$dados['pre_requisito'] = $this->db->get('pre_requisito')->result();}
			else{
				$this->db->where('codigo_eq',$dados['codigo']);
				$this->db->select('cod_pre_eq');
				$this->db->select('nome_pre_eq');
				$dados['pre_requisito'] = $this->db->get('disciplina_equivalente')->result();
			}
			$this->load->model('data_model','data'); // carrega o modelo Data_model
			$dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

			$this->load->view('includes/header');
			$this->load->view('includes/menu_aluno');
			$this->load->view('adicionar_notas',$dados); // passa o array $data para a view adicionar_equivalente

			$this->load->view('includes/footer');


		}

		public function salvar(){
			$this->load->model('Inscricao_model','inscricao');
			if($this->inscricao->salvar())
				redirect('ver_inscricao/1');
		}
	}
