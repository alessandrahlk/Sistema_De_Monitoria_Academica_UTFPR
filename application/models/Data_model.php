<?php
class Data_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function salvar()
  {

    $data['login'] = $this->input->post('login');
    $data['id'] = '1'; // atribui os valores no array $data, $data2, $data3
    $data['nome'] = "Coordenação";
    $data['inicio'] = $this->input->post('inicio')." 00:00:00";
    $data['fim'] = $this->input->post('fim')." 00:00:00";

    $data2['login'] = $this->input->post('login');
    $data2['id'] = '2';
    $data2['nome'] = "Chefe de departamento";
    $data2['inicio'] = $this->input->post('inicio2')." 00:00:00";
    $data2['fim'] = $this->input->post('fim2')." 00:00:00";

    $data3['login'] = $this->input->post('login');
    $data3['id'] = '3';
    $data3['nome'] = "Diretoria de graduação";
    $data3['inicio'] = $this->input->post('inicio3')." 00:00:00";
    $data3['fim'] = $this->input->post('fim3')." 00:00:00";

    $data4['login'] = $this->input->post('login');
    $data4['id'] = '5';
    $data4['nome'] = "Alunos - Prazo para inscrições";
    $data4['inicio'] = $this->input->post('inicio4')." 00:00:00";
    $data4['fim'] = $this->input->post('fim4')." 00:00:00";

    $data5['login'] = $this->input->post('login');
    $data5['id'] = '6';
    $data5['nome'] = "Alunos - Data do resultado";
    $data5['inicio'] = "";
    $data5['fim'] = $this->input->post('fim5')." 00:00:00";

    $data6['login'] = $this->input->post('login');
    $data6['id'] = '7';
    $data6['nome'] = "Alunos - Prazo para recursos";
    $data6['inicio'] = $this->input->post('inicio6')." 00:00:00";
    $data6['fim'] = $this->input->post('fim6')." 00:00:00";

    $this->db->where('id','1'); // verifica se já foi preenchido os dados na tabela ou não
    $query = $this->db->get('datas')->result();

    if(empty($query)) // se a query está vazia, faz insert
    return $this->db->insert('datas',$data) && $this->db->insert('datas',$data2) && $this->db->insert('datas',$data3)
    && $this->db->insert('datas',$data4) && $this->db->insert('datas',$data5) && $this->db->insert('datas',$data6); /*Insert no banco.*/
    else // se a query não está vazia, da replace
    return $this->db->replace('datas',$data) && $this->db->replace('datas',$data2) && $this->db->replace('datas',$data3)
    && $this->db->replace('datas',$data4) && $this->db->replace('datas',$data5) && $this->db->replace('datas',$data6); /*Update no banco caso já exista dados.*/
  }

  function get_datas(){ // obtém todos os dados da tabela dados
    $this->db->select('*');
    return $this->db->get('datas')->result();
  }


}
