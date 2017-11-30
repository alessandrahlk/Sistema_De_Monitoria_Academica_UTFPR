<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrucoes extends CI_Controller {

		public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==true){
			redirect('instrucoes_log');
		}
	}

	public function index()
	{
		$this->load->view('includes/header');
		if($this->session->has_userdata('logado')==false)
		$this->load->view('includes/menu');
		else{
		$verifica =  $this->session->userdata('tipo'); // verifica o tipo de usuário e carrega o menu correspondente
		if($verifica == 1){
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
					else if($verifica == 11){
						$this->load->view('includes/menu_admin');}
						else{
							$this->load->view('includes/menu');}}

							$this->load->view('instrucoes');
							$this->load->view('includes/footer');
						}

					}
