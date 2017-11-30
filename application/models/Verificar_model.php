<?php
class Verificar_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function salvar_chefdep()
  {
    $data['login'] = $this->input->post('login');
    $data['tipo'] = $this->input->post('tipo');
    $data['aprovacao'] = $this->input->post('aprovacao');
    $data['obs'] = $this->input->post('obs');

    $this->db->where('tipo',$data['tipo']);
    $query = $this->db->get('aprovacao')->result(); // verifica se já foi inserido na tabela o dado

    if(empty($query))
    return $this->db->insert('aprovacao',$data); // insert no banco
    else
    return $this->db->replace('aprovacao',$data); // update caso já exista dados
  }


  function get_aprovacao(){ // obtém os dados da tabela aprovacao
    $this->db->select('*');
    return $this->db->get('aprovacao')->result();
  }



}
