<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivo extends CI_Controller { // a classe sempre deve estar em letra maiúscula

	public function index()
	{
		$this->load->view('includes/header'); // carrega a view header
		$this->load->view('includes/menu'); // carrega o menu
		$this->load->view('arquivo'); // carrega a view arquivo
		$this->load->view('includes/footer'); // carrega a parte final do layout
	}

}
