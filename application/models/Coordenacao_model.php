<?php
class Coordenacao_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function salvar_disciplina()
  {
    $login = $this->session->userdata('login'); // pega informações de login e departamento do usuário na session
    $departamento = $this->session->userdata('departamento');

    $codigo = trim($this->input->post('codigo'));

    $data['codigo'] = str_replace(' ','', $codigo); // pega as informações enviadas por Post
    $data['nome'] = $this->input->post('nome');
    $data['orientador'] = $this->input->post('orientador');
    $data['n_bolsistas'] = $this->input->post('n_bolsistas');
    $data['n_voluntarios'] = $this->input->post('n_voluntarios');
    $data['login_coordenador'] = $login;
    $data['departamento'] = $departamento;

    return $this->db->insert('disciplina',$data); // insert na tabela disciplina
  }

  function get_disciplina(){ // obtém as disciplinas do departamento correspondente da session do usuário
    $user = $this->session->userdata('departamento');
    $this->db->where('departamento',$user);
    return $this->db->get('disciplina')->result();
  }

  function get_disciplinaeq(){ // obtém dados da tabela disciplina_equivalente
    $this->db->select('*');
    return $this->db->get('disciplina_equivalente')->result();
  }


  function get_prerequisito(){ // obtém dados da tabela pre_requisito
    $this->db->select('*');
    return $this->db->get('pre_requisito')->result();
  }


  public function salvar_equivalente(){ // salva equivalente da disciplina que foi selecionada
    $codigo_eq = $this->input->post('codigo_eq');

    $data['disciplina'] =  $this->input->post('codigo_disciplina');
    $data['codigo_eq'] = str_replace(' ','', $codigo_eq);
    $data['nome_eq'] = $this->input->post('nome_eq');

    $this->db->where('codigo_eq',$codigo_eq);
    $this->db->where('disciplina',$data['disciplina']);
    $query = $this->db->get('disciplina_equivalente');
    $result = $query->num_rows();
    if($result>0)
    return 0;
    else
    return $this->db->insert('disciplina_equivalente',$data);


  }

  public function salvar_pre($id){ // salva pré-requisito da disciplina que foi selecionada
    $codigo_pre = $this->input->post('codigo_pre');

    $data['codigo_disciplina'] = trim($this->input->post('codigo_disciplina'));
    $data['codigo_pre'] = str_replace(' ','', $codigo_pre);
    $data['nome_pre'] = $this->input->post('nome_pre');

    $this->db->where('codigo_pre',$codigo_pre);
    $this->db->where('codigo_disciplina',$data['codigo_disciplina']);
    $query = $this->db->get('pre_requisito');
    $result = $query->num_rows();
    if($result>0)
    return 0;
    else
    return $this->db->insert('pre_requisito',$data);

  }

  public function salvar_pre_equivalente(){ // salva pré-requisito da disciplina que foi selecionada
    $data['disciplina'] = trim($this->uri->segment(3)); //pega o terceiro elemento da url (o qual é o código da disciplina)
    $data['codigo_eq'] = trim($this->input->post('codigo_eq'));
    $data['nome_eq'] = $this->input->post('nome_eq');
    $cod_pre_eq = trim($this->input->post('codigo_pre'));
    $data['cod_pre_eq'] = str_replace(' ','', $cod_pre_eq);
    $data['nome_pre_eq'] = $this->input->post('nome_pre');

    $this->db->where('disciplina',$data['disciplina']);
    $this->db->where('codigo_eq',$data['codigo_eq']);
    $this->db->where('cod_pre_eq',"");
    $query = $this->db->get('disciplina_equivalente')->num_rows();

    $this->db->where('cod_pre_eq',$data['cod_pre_eq']);
    $this->db->where('disciplina',$data['disciplina']);
    $query2 = $this->db->get('disciplina_equivalente')->num_rows();

    if($query == 1){ // se só tiver 1 linha, dar update
      $this->db->where('disciplina',$data['disciplina']);
      $this->db->where('codigo_eq',$data['codigo_eq']);
      return $this->db->update('disciplina_equivalente',$data);}
      else{
      if($query2>0){ // se tiver mais de 1 linha, inserir uma nova linha com todos os dados
      return 0;}
      else{
        return $this->db->insert('disciplina_equivalente',$data);
      }
    }

    }

    public function excluir_equivalente($id){ // exclui uma disciplina equivalente da disciplina selecionada
      $codigo = $this->input->post('excluir_codigo_eq');
      $this->db->where('disciplina',$id);
      $this->db->where('codigo_eq',$codigo);
      return $this->db->delete(disciplina_equivalente);

    }

    public function excluir_pre($id){  // exclui um pré-requisito da disciplina selecionada
      $codigo = $this->input->post('excluir_codigo_pre');
      $this->db->where('codigo_disciplina',$id);
      $this->db->where('codigo_pre',$codigo);
      return $this->db->delete(pre_requisito);

    }

    public function excluir_pre_equivalente(){  // exclui um pré-requisito da disciplina equivalente
      $codigo = $this->input->post('excluir');
      $equivalente = $this->uri->segment(4);
      $disciplina = $this->uri->segment(3);

      $this->db->where('disciplina',$disciplina);
      $this->db->where('codigo_eq',$equivalente);
      $query = $this->db->get('disciplina_equivalente')->num_rows(); // conta o número de querys

      if($query == 1){
        $data['cod_pre_eq'] = ""; // se tiver apenas 1, preencher o código do pré-requisito com ""
        $data['nome_pre_eq'] = "";
        $this->db->where('cod_pre_eq',$codigo);
        $this->db->where('codigo_eq',$equivalente);
        $this->db->where('disciplina',$disciplina);
        return $this->db->update('disciplina_equivalente',$data);}

        else{
          $this->db->where('cod_pre_eq',$codigo); // se tiver mais de 1, deletar
          $this->db->where('codigo_eq',$equivalente);
          $this->db->where('disciplina',$disciplina);
          return $this->db->delete(disciplina_equivalente);
        }
      }

      public function salvar_edicao(){ // edição das disciplinas

        $codigo = $this->input->post('codigo');
        $test1 =$this->input->post('nome');
        if(!empty($test1)) //Verifica se nome foi preenchido para atribuir ou não ao $data
        $data['nome'] = $this->input->post('nome'); //$data[nome do campo no banco] / post (nome do campo no formulário)

        $test2 =$this->input->post('orientador');
        if(!empty($test2))
        $data['orientador'] = $this->input->post('orientador');

        $test3 =$this->input->post('n_bolsistas');
        if(!empty($test3))
        $data['n_bolsistas'] = $this->input->post('n_bolsistas');

        $test4 =$this->input->post('n_voluntarios');
        if(!empty($test4))
        $data['n_voluntarios'] = $this->input->post('n_voluntarios');

        $this->db->where('codigo',$codigo);
        return $this->db->update('disciplina',$data); // update dos dados que foram preenchidos no formulário

      }

      public function excluir($id){ // exclui disciplina
        $this->db->where('disciplina',$id);
        $this->db->delete(disciplina_equivalente); // deleta todas as equivalentes da disciplina $id

        $this->db->where('codigo_disciplina',$id);
        $this->db->delete(pre_requisito); // deleta todos os pré-requisitos da disciplina $id

        $this->db->where('codigo',$id);
        return $this->db->delete(disciplina); // por fim, deleta a disciplina

      }


    }
