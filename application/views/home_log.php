
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<h2>Sistema de Seleção de Monitores</h2> Prazo:
		    <?php $user=$this->session->userdata('tipo');
        if($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim))." 00:00:00";
         else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim))." 00:00:00";
         else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim))." 00:00:00";
         else if($user == "4" ) echo "---";
		  else if($user == "5" ) echo date('d/m/Y', strtotime($datas[3]->fim));
         else echo "---";?>

    		 Faltam:
    		 <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
		<hr>
		<div class="col-sm-12">
		<b>Importante:</b> só é possível fazer alterações dentro dos prazos estabelecidos. Servidores precisam aguardam a liberação de acesso pelo administrador do sistema para fazer o primeiro acesso.
		Servidores e alunos, façam primeiramente o <a href="<?= base_url(); ?>login_ldap">Login</a> para ter acesso ao sistema. Em caso de dúvida entrar em contato com - <u>@</u>.<br/>
<br/><br/>
		<h4>Datas importantes - Edital</h4><br/>

			<ul>
				<li>(Coordenação) Prazo para indicação de disciplinas e orientadores: <?= date('d/m/Y', strtotime($datas[0]->inicio)); ?> até <?= date('d/m/Y', strtotime($datas[0]->fim)); ?>.</li>
				<li>(Chefe de Departamento) Prazo para avaliação do número de bolsas: <?= date('d/m/Y', strtotime($datas[1]->inicio)); ?> até <?= date('d/m/Y', strtotime($datas[1]->fim)); ?>.</li>
				<li>(Diretoria de graduação) Aprovação da minuta do edital : <?= date('d/m/Y', strtotime($datas[2]->inicio)); ?> até <?= date('d/m/Y', strtotime($datas[2]->fim)); ?>.</li></ul>


				<h4>Datas importantes - Seleção de monitores</h4><br/>

			<ul>
				<li>Prazo para inscrições: <?= date('d/m/Y', strtotime($datas[3]->inicio)); ?> até <?= date('d/m/Y', strtotime($datas[3]->fim)); ?>.</li>
				<li>Publicação do resultado: <?= date('d/m/Y', strtotime($datas[4]->fim)); ?>.
				<li>Recursos: <?= date('d/m/Y', strtotime($datas[5]->inicio)); ?> até <?= date('d/m/Y', strtotime($datas[5]->fim)); ?>.</li></ul>
			</div>


			</div>
