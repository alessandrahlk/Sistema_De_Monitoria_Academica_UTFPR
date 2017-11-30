<?php
class Inscricao_model extends CI_Model{ // classe sempre deve estar em letra maiúscula

  public function adicionar_notas(){
    $dados['codigo'] = $this->input->post('codigo');
    $dados['disciplina'] = $this->input->post('disciplina');
    if($dados['codigo']==$dados['disciplina']){
      $dados['codigo'] = "";
      $dados['disciplina'] = $this->input->post('disciplina');
      return $dados;
    }else {
      return $dados;

    }
  }

  public function salvar(){
    $data['login'] = $this->input->post('login');
    $data['disciplina'] = $this->input->post('disciplina');
    $data['equivalente'] = $this->input->post('equivalente');
    $data['nota'] = $this->input->post('nota');
    $data['coeficiente'] = ($this->input->post('coeficiente'))*10;
    $i = $this->input->post('i');
    $array = array();
    while($i>=0){
      $aux= 'pre_requisito'.$i;
      $aux2 = $this->input->post($aux);
      array_push($array,$aux2);
      $i=$i-1;
    }
    $i = $this->input->post('i');
    $array2 = array();
    while($i>=0){
      $aux= 'notas_pre'.$i;
      $aux2 = $this->input->post($aux);
      array_push($array2,$aux2);
      $i=$i-1;
    }
    $string= implode(" | ", $array);
    $notas= implode(" | ", $array2);


    if(!empty($string)){
      $string = $string." |";
      $notas = $notas." |";}

      $data['pre_requisitos'] = $string;
      $data['notas_pre'] = $notas;

      $i = $this->input->post('i');
      $soma=0;
      foreach($array2 as $a){
        $soma = $soma+$a;
      }

      //media = 70% a nota 30% CR
      if($soma!=0){
        $media = ($data['coeficiente']*0.3) + ((($data['nota']+$soma)/($i + 1))*0.7);}
        else {
          $media = ($data['coeficiente']*0.3) + ($data['nota']*0.7);
        }
        $data['media'] = $media;
        $data['verificacao'] = "0"; //0 = não verificado, 1 = verificado
        return $this->db->insert('inscricao',$data);
      }

      public function excluir(){
        $equivalente = $this->uri->segment(4);
        $disciplina = $this->uri->segment(3);
        if(empty($equivalente))
          $equivalente="";
        $this->db->where('disciplina',$disciplina);
        $this->db->where('equivalente',$equivalente);

        return $this->db->delete(inscricao);
      }

    }
