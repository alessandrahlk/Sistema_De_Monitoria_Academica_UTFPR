<?php
class Bolsa_model extends CI_Model{ // classe sempre deve estar em letra maiúscula


  public function salvar(){

    $data['departamento'] = $this->input->post('departamento'); // atribui os valores ao array $data
    $data['n_bol'] = $this->input->post('n_bol');
    $data['n_vol'] = $this->input->post('n_vol');
    $departamento = $this->input->post('departamento');

    $this->db->where('departamento',$departamento);
    $query = $this->db->get('n_bolsas')->result(); // verifica se já foi inserido o número de bolsas no departamento

    if(empty($query)){ // se a query não retornou nada, da insert no banco
      return $this->db->insert('n_bolsas',$data);}

      else{ // se a query retornou alguma coisa, da update no banco
        $this->db->where('departamento', $departamento);
        return $this->db->update('n_bolsas',$data);}

      }


      function get_bolsas(){ // obtem todos os dados da tabela n_bolsas
        $this->db->select('*');
        return $this->db->get('n_bolsas')->result();
      }



    }
