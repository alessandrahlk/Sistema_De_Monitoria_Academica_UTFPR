<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenacao extends CI_Controller {

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

    $this->load->model('data_model','data'); // carrega o modelo Data_model
    $dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

    $this->load->model('bolsa_model','bolsa'); // carrega o modelo Bolsa_model
    $dados['n_bolsas'] = $this->bolsa->get_bolsas(); // usa a função get_bolsas() do Bolsa_model para obter todos os dados da tabela n_bolsas

    $this->load->model('coordenacao_model','coor');
    $dados['disciplina'] = $this->coor->get_disciplina();
    $dados['pre_requisito'] = $this->coor->get_prerequisito();

    $dados['disciplina_equivalente'] = $this->coor->get_disciplinaeq();

    $this->db->select('codigo_eq');
    $this->db->select('disciplina');
    $dados['coluna1'] = $this->db->get('disciplina_equivalente')->result();

    $this->load->view('includes/header');
    $this->load->view('includes/menu_coor');
    $this->load->view('coordenacao',$dados); // passa o array $dados para a view coordenacao

    if($indice==1){ // mostra se a operação foi realizada com sucesso ou se houve erro conforme os índices dos redirects
      $data['msg'] = "Disciplina inserida com sucesso.";
      $this->load->view('includes/sucesso',$data);
    }
    if($indice==2){
      $data['msg'] = "Erro ao inserir disciplina.";
      $this->load->view('includes/erro',$data);
    }
    if($indice==3){
      $data['msg'] = "Disciplina atualizada com sucesso.";
      $this->load->view('includes/sucesso',$data);
    }
    if($indice==4){
      $data['msg'] = "Erro ao atualizar disciplina.";
      $this->load->view('includes/erro',$data);
    }
    if($indice==5){
      $data['msg'] = "Disciplina excluída com sucesso.";
      $this->load->view('includes/sucesso',$data);
    }
    if($indice==6){
      $data['msg'] = "Erro ao excluir disciplina.";
      $this->load->view('includes/erro',$data);
    }
    $this->load->view('includes/footer');
  }

  public function salvar(){
    $this->load->model('Coordenacao_model','coordenacao'); // carrega Coordenacao_model para poder usar suas funções
    if($this->coordenacao->salvar_disciplina()){ // executa salvar_disciplina() de Coordenacao_model
      redirect('coordenacao/1'); // sucesso
    }
    else{
      redirect('coordenacao/2'); // erro
    }
  }

  public function adicionar_equivalente($id=null){
    $this->load->model('data_model','data'); // carrega o modelo Data_model
    $data['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

    $this->db->where('codigo',$id);
    $data['disciplina'] = $this->db->get('disciplina')->result(); // procura os dados da disciplina com código $id

    //$this->load->model('coordenacao_model','coor');
    //$data['pre'] = $this->coor->get_prerequisito();

    $this->db->where('disciplina',$id);
    $data['disciplina_equivalente'] = $this->db->get('disciplina_equivalente')->result();

    /*$this->db->group_by('codigo_eq');
    $this->db->select('codigo_eq');
    $this->db->select('nome_eq');
    $this->db->select('disciplina');
    $data['coluna1'] = $this->db->get('disciplina_equivalente')->result();*/

    $this->db->group_by('codigo_eq');
    $this->db->select('codigo_eq');
    $this->db->select('nome_eq');
    $this->db->select('disciplina');
    $this->db->where('disciplina',$id);
    $data['coluna1'] = $this->db->get('disciplina_equivalente')->result();

    $this->load->view('includes/header');
    $this->load->view('includes/menu_coor');
    $this->load->view('adicionar_equivalente',$data); // passa o array $data para a view adicionar_equivalente

    $this->load->view('includes/footer');
  }

  public function adicionar_pre($id=null){
    $this->load->model('data_model','data'); // carrega o modelo Data_model
    $data['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

    $this->db->where('codigo_disciplina',$id);
    $data['pre_requisito'] = $this->db->get('pre_requisito')->result(); // procura no banco de dados os pré-requisitos com código $id

    $this->db->where('codigo',$id);
    $data['disciplina'] = $this->db->get('disciplina')->result(); // procura no banco de dados a disciplina de código $id

    $this->load->view('includes/header');
    $this->load->view('includes/menu_coor');
    $this->load->view('adicionar_pre',$data); // passa o array $data para a view adicionar_pre
    $this->load->view('includes/footer');
  }

  public function adicionar_pre_equivalente(){
    $this->load->model('data_model','data'); // carrega o modelo Data_model
    $data['datas'] = $this->data->get_datas(); // obtém dados da tabela datas
    $cod_eq = $this->uri->segment(4); // pega o quarto elemento da url (código da equivalente)
    $disciplina = $this->uri->segment(3);

    $this->db->where('codigo_eq',$cod_eq);
    $this->db->where('disciplina',$disciplina);
    $data['disciplina_equivalente'] = $this->db->get('disciplina_equivalente')->result(); // procura os dados da disciplina equivalente com código $id

    $this->load->view('includes/header');
    $this->load->view('includes/menu_coor');
    $this->load->view('adicionar_pre_equivalente',$data); // passa o array $data para a view adicionar_equivalente

    $this->load->view('includes/footer');
  }

  public function editar($id=null){

    $this->load->model('data_model','data'); // carrega o modelo Data_model
    $data['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

    $this->db->where('codigo',$id);
    $data['disciplina'] = $this->db->get('disciplina')->result(); // procura no banco a disciplina com o código $id

    $this->load->view('includes/header');
    $this->load->view('includes/menu_coor');
    $this->load->view('editar',$data); // passa para a view editar o array $data
    $this->load->view('includes/footer');
  }

  public function salvar_pre($id=null){

    $this->load->model('coordenacao_model','coor');
    $this->coor->salvar_pre($id);
    redirect('coordenacao/adicionar_pre/'.$id); // redireciona para a mesma página quando se realiza salvar_pre()

  }

  public function salvar_edicao(){
    $this->load->model('coordenacao_model','coor');
    if($this->coor->salvar_edicao()){ // a função salvar_edicao() de Coordenacao_model faz uptade do usuário com o login correspondente
      redirect('coordenacao/3');
    }
    else {
      redirect('coordenacao/4');}

    }

    public function salvar_equivalente($id=null){

      $this->load->model('coordenacao_model','coor');
      $this->coor->salvar_equivalente($id);
      redirect('coordenacao/adicionar_equivalente/'.$id);

    }

    public function salvar_pre_equivalente(){

      $this->load->model('coordenacao_model','coor');
      $this->coor->salvar_pre_equivalente();
      $disciplina = $this->uri->segment(3);
      $equivalente = $this->uri->segment(4);
      redirect('coordenacao/adicionar_pre_equivalente/'.$disciplina.'/'.$equivalente);

    }

    public function excluir_equivalente($id=null){
      $this->load->model('coordenacao_model','coor');
      $this->coor->excluir_equivalente($id);
      redirect('coordenacao/adicionar_equivalente/'.$id); // redireciona para a mesma página
    }

    public function excluir_pre($id=null){
      $this->load->model('coordenacao_model','coor');
      $this->coor->excluir_pre($id);
      redirect('coordenacao/adicionar_pre/'.$id);
    }

    public function excluir_pre_equivalente(){
      $this->load->model('coordenacao_model','coor');
      $this->coor->excluir_pre_equivalente();
      $disciplina = $this->uri->segment(3);
      $equivalente = $this->uri->segment(4);
      redirect('coordenacao/adicionar_pre_equivalente/'.$disciplina.'/'.$equivalente); // redireciona para a mesma página
    }

    public function excluir($id=null){
      $this->load->model('Coordenacao_model','coor');
      if($this->coor->excluir($id))
      redirect('coordenacao/5');
      else
      redirect('coordenacao/6');
    }

  }
