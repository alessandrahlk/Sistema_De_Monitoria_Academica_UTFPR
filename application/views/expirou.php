
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<h2>Sistema de Seleção de Monitores</h2> Prazo:
		<?php $user=$this->session->userdata('tipo');
				if ($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim));
				 else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim));
				 else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim));
				 else if($user == "4" ) echo "---";
				 else echo "---";?>

		 00:00:00 Faltam:
		 <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
		<hr>
		<div class="col-sm-12">

    O prazo expirou, não é mais possível fazer inserções/alterações.
