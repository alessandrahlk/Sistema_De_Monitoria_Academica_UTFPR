<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ldap extends CI_Controller {

  public function index($indice=null)
  {
    $this->load->view('includes/header'); // carrega as views

if($this->session->has_userdata('logado')==false)
$this->load->view('includes/menu');
else{
    $verifica =  $this->session->userdata('tipo'); // carrega o menu com as opções correspondentes conforme o tipo de usuário
    if($verifica == 11){
      $this->load->view('includes/menu_admin');}
      else if($verifica == 1){
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
            else{
              $this->load->view('includes/menu');}}

              $this->load->view('login_ldap');
              if($indice==1){ // mensagens de erro
                $data['msg'] = "Erro: login ou senha incorretos.";
                $this->load->view('includes/erro',$data);}
                if($indice==2){
                  $data['msg'] = "Erro: não foi possível conectar à base de dados.";
                  $this->load->view('includes/erro',$data);}

                $this->load->view('includes/footer');
              }

              public function logar(){

                $this->load->model('Ldap_model','ldap');
                $data = $this->ldap->logar_ldap();

                if($data == 1){ // se a função logar_ldap() do modelo Ldap_model retornar 1, quer dizer que o login ou senha estão incorretos
                  redirect('login_ldap/1');
                }
                else if($data == 2){
                  redirect('login_ldap/2'); // se a função logar_ldap() do modelo Ldap_model retornar 2, quer dizer que não foi possível conectar com Ldap
                }

                else{
                  $login = $data['login']; // pega o login retornado do Ldap
                  $nome = $data['nome']; // pega o nome retornado do Ldap
                  $tipo = $data['tipo'];

                  $this->db->where('login',$login); // procura na tabela usuarios se existe o login
                  $this->db->where('status',"Ativo"); // e se está com status Ativo
                  $data['usuario'] = $this->db->get('usuario')->result();
                  if(empty($data['usuario'])){
                    $this->db->where('login',$login); // procura na tabela usuario_aluno se existe o login
                    $this->db->where('status',"Ativo"); // e se está com status Ativo
                    $data['usuario'] = $this->db->get('usuario_aluno')->result();
                  }

                  if(!empty($data['usuario'])){ // se a busca retornou algum resultado, atribui as variáveis para a session
                      $dados['login'] = $login;
                      $dados['nome'] = $nome;
                      $dados['departamento'] = $data['usuario'][0]->nome_dep;
                      $dados['tipo'] = $data['usuario'][0]->tipo;
                      $dados['logado'] = true;

                      $this->session->set_userdata($dados);
                      $verifica =  $this->session->userdata('tipo'); // verifica qual tipo de usuário que é para redirecionar para a página correspondete

                      if ($verifica == 1) // 1 = coordenador
                      redirect('coordenacao');
                      else if($verifica == 2) // 2 = chefe de departamento
                      redirect('verificacao');
                      else if($verifica == 3) // 3 = diretoria de graduação
                      redirect('verificacao');
                      else if($verifica == 4) // 4 = DEPED
                      redirect('datas');
                      else if($verifica == 5) // nenhum = aluno
                      redirect('inscricoes');
                      else if($verifica == 11) // 11 = admin
                      redirect('usuarios');
                 }
                    else{ // se a busca não retornou nenhum resultado, quer dizer que é primeiro acesso
                      $dados['login'] = $login; // passa dados do Ldap (login, nome, email e campus)
                      $dados['nome'] = $nome;
                      //$dados['email'] = $data['email'];
                      $dados['tipo'] = $data['tipo'];
                      $this->session->set_userdata($dados); // coloca na session mas não é possível acessar outras páginas porque não possui variável logado = true
                      if(empty($data['tipo'])) // se tipo está vazio quer dizer que no ldap não retornou nenhum dn="ou=aluno"
                      redirect('cadastro'); // redireciona para cadastro de professores ou servidores
                      else
                      redirect('cadastro_aluno'); // redireciona para cadastro de alunos
                    }
                }
                }

              public function logout(){
                $this->session->sess_destroy(); // destrói session
                redirect('login_ldap'); // redireciona para login_ldap.php
              }

            }
