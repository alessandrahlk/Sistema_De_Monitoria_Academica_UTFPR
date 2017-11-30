<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

		public function __construct(){ // primeiramente verifica se o usuário está logado
		parent::__construct();
		if($this->session->has_userdata('logado')==true){
			redirect('home_log');
		}
	}

	public function index()
	{
		$this->load->model('Data_model','data'); // carrega o modelo Data_model
		$dados['datas'] = $this->data->get_datas(); // obtém dados da tabela datas

		$this->load->view('includes/header'); // carrega as views
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

							$this->load->view('home',$dados);
							$this->load->view('includes/footer');
						}

					}
