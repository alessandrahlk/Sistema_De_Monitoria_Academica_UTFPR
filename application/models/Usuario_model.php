<?php
class Usuario_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function verifica_data(){ //verifica se o coordenador está acessando dentro das datas estabelecidas
    date_default_timezone_set('America/Sao_Paulo');

    $verifica_tipo = $this->session->userdata('tipo');
    $this->db->select('inicio');
    $this->db->where('id', $verifica_tipo);
    $verifica_data_ini =  $this->db->get('datas')->result();
    $this->db->select('fim');
    $this->db->where('id', $verifica_tipo);
    $verifica_data_fim =  $this->db->get('datas')->result();

    if(strtotime(date('Y-m-d H:i:s')) < strtotime($verifica_data_ini[0]->inicio) || strtotime(date('Y-m-d H:i:s')) > strtotime($verifica_data_fim[0]->fim))
    redirect(expirou);
  }

  public function verifica_data_chefdep(){
    date_default_timezone_set('America/Sao_Paulo');

    $verifica_tipo = $this->session->userdata('tipo');
    $this->db->select('inicio');
    $this->db->where('id', $verifica_tipo);
    $verifica_data_ini =  $this->db->get('datas')->result();
    $this->db->select('fim');
    $this->db->where('id', $verifica_tipo);
    $verifica_data_fim =  $this->db->get('datas')->result();

    if(strtotime(date('Y-m-d H:i:s')) < strtotime($verifica_data_ini[0]->inicio) || strtotime(date('Y-m-d H:i:s')) > strtotime($verifica_data_fim[0]->fim))
    return 1;
  }

  public function inserir()
  {
    $data['nome'] = $this->input->post('nome'); // atribui os valores ao array $data pelo formulário da view
    $data['login'] = $this->input->post('login');
    $data['nome_dep'] = $this->input->post('nome_dep');
    $data['tipo'] = $this->input->post('tipo');
    $data['status'] = $this->input->post('status');

    return $this->db->insert('usuario',$data); // dá insert na tabela usuario

  }

  public function inserir_aluno()
  {
    $data['nome'] = $this->input->post('nome'); // atribui os valores ao array $data pelo formulário da view
    $data['login'] = $this->input->post('login');
    $data['curso'] = $this->input->post('curso');
    $data['tipo'] = "5";
    $data['status'] = $this->input->post('status');

    return $this->db->insert('usuario_aluno',$data); // dá insert na tabela usuario

  }

  public function excluir($id){ // exclui a linha com usuário login = $id
    $this->db->where('login',$id);
    return $this->db->delete(usuario);

  }

  function get_usuarios(){ // obtém todos os usuários ordenados por tipo em ordem asc
    $this->db->select('*');
    $this->db->order_by("tipo","asc");
    return $this->db->get('usuario')->result();
  }

  function get_coor(){ // obtém os dados da tabela coordenacao
    $this->db->select('*');
    return $this->db->get('coordenacao')->result();
  }

  public function salvar_atualizacao(){ // edição do usuário

    $login = $this->input->post('login');

    $test3 =$this->input->post('nome_dep');
    if(!empty($test3)) // verifica se está vazio ou não para atribuir ao $data
    $data['nome_dep'] = $this->input->post('nome_dep');

    $test4 =$this->input->post('tipo');
    if(!empty($test4))
    $data['tipo'] = $this->input->post('tipo');

    $test5 =$this->input->post('status');
    if(!empty($test5))
    $data['status'] = $this->input->post('status');

    $this->db->where('login',$login);

    return $this->db->update('usuario',$data); // dá update nas informações do usuario com o login correspondente

  }

  public function add_coordenador($id){ // adiciona dados na tabela coordenacao
    $this->db->where('login',$id);
    $data['usuario'] = $this->db->get('usuario')->result(); // procura dados do usuario com login correspondente

    $dados['departamento'] = $data['usuario'][0]->nome_dep;
    $dados['login'] = $data['usuario'][0]->login;

    return $this->db->insert('coordenacao',$dados); // insere na tabela

  }

  public function excluir_coor($id){ // exclui coordenador
    $this->db->where('login',$id);
    return $this->db->delete(coordenacao);

  }



}
