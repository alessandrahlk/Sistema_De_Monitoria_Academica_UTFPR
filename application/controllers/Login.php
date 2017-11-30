
//CONTROLLER NÃO UTILIZADO, LOGIN.PHP ANTES DE UTILIZAR LDAP

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


  public function index($indice=null)
  {
    $this->load->view('includes/header');

    $verifica =  $this->session->userdata('tipo');
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
            else{
              $this->load->view('includes/menu');}

              $this->load->view('login');
              if($indice==1){
                $data['msg'] = "Erro: login ou senha incorretos.";
                $this->load->view('includes/erro',$data);}

                $this->load->view('includes/footer');
              }

              public function logar(){
                $login = $this->input->post('login');
                //$senha = md5($this->input->post('senha'));

                //$this->db->where('senha',$senha);
                $this->db->where('login',$login);
                $this->db->where('status',"Ativo");

                $data['usuario'] = $this->db->get('usuario')->result();

                if(!empty($data['usuario'])){
                  $dados['login'] = $data['usuario'][0]->login;
                  $dados['nome'] = $data['usuario'][0]->nome;
                  $dados['departamento'] = $data['usuario'][0]->nome_dep;
                  $dados['tipo'] = $data['usuario'][0]->tipo;
                  $dados['logado'] = true;
                  $this->session->set_userdata($dados);

                  $verifica =  $this->session->userdata('tipo');
                  if ($verifica == 1)
                  redirect('coordenacao');
                  else if($verifica == 2)
                  redirect('verificacao');
                  else if($verifica == 3)
                  redirect('verificacao');
                  else if($verifica == 4)
                  redirect('datas');
                  else if($verifica == 11)
                  redirect('usuarios');
                }
                else
                redirect('login/1');
              }

              public function logout(){
                $this->session->sess_destroy();
                redirect('login');

              }




            }
