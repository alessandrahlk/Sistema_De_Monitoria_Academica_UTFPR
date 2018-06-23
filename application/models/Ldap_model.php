<?php
class Ldap_model extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function logar_ldap(){
    $ldaphost = ''; //IP
    $ldapport = ''; //Porta
    $dn = "dc=utfpr,dc=edu,dc=br";
    $autentica = false;

    $usuario = $this->input->post('login');
    $senha = $this->input->post('senha');

    if($usuario == 'admin' && $senha == ''){ // caso for admin, não realiza conecção ao Ldap e entra na área admin

      $data['login'] = $usuario;
      $data['nome'] = "admin";

      return $data;

    }else{

      $ds = ldap_connect($ldaphost, $ldapport) or die("Nao foi possivel conectar ao servidor $ldaphost");
      ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

      if ($ds) { // se conseguiu realizar ldap_connect
        $filter = "uid=".$usuario;
        $justthese = array("givenname", "dn", "cn", "mail", "uid", "employeenumber", "l", "carlicense");

        $sr = ldap_search($ds, $dn, $filter, $justthese);

        $info = ldap_get_entries($ds, $sr);

        $username = $info[0]["dn"];

        $ds = ldap_connect($ldaphost, $ldapport) or die("Nao foi possivel conectar ao servidor $ldaphost");
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        $ldapbind = ldap_bind($ds, $username, $senha);

        if ($ldapbind) { // busca no banco de dados

          $data['login'] = $info[0]["uid"][0];
          $data['nome'] = $info[0]["cn"][0];
          $explode = explode(",",$info[0]["dn"]);
          foreach ($explode as $ex){
            if ($ex == "ou=alunos")
            $data['tipo'] = "5"; //tipo aluno
          }

          return $data; // retorna o array com os dados

        }else{
          return "1"; // dados incorretos
        }

      }else{
        return "2"; // não foi possível conectar o Ldap
      }


    }

  }}
