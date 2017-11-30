<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrucoes_log extends CI_Controller {

	public function index()
	{
		$this->load->model('data_model','data'); // carrega o modelo Data_model
		$dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

		$this->load->view('includes/header');
		if($this->session->has_userdata('logado')==false)
		$this->load->view('includes/menu');
		else{
		$verifica =  $this->session->userdata('tipo');
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


							$this->load->view('instrucoes_log',$dados);
							$this->load->view('includes/footer');
						}

					}
