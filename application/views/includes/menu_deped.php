
<!-- Sidebar -->
<div id="sidebar-wrapper" >
	<ul class="sidebar-nav" >

		<li class="sidebar-brand" >
			<a href="<?= base_url(); ?>home">
				Início
			</a>
		</li>
		<li>
			<a href="<?= base_url(); ?>login_ldap">Login</a>
		</li>

		<li>
			<a href="<?= base_url(); ?>datas">Datas</a>
		</li>
		<li>
			<a href="<?= base_url(); ?>n_bolsas">Num bolsas</a>
		</li>
		<li>
			<a href="<?= base_url(); ?>verificacao">Relatório final</a>
		</li>
		<br/>

		<li>Instruções</li>
		<ul>

		<li>
			<a href="<?= base_url(); ?>instrucoes">Gerais</a>

		</li>

		<li>
		<a href="<?= base_url(); ?>orientadores" target="_blank">Para Orientadores</a></b>
		</li>
		<li>
			<a href="<?= base_url(); ?>monitores" target="_blank">Para Monitores</a>
		</li>

		</ul>
		<br/>

		<li>
			Login: <?php $user = $this->session->userdata('login');
			echo $user; ?></li>
			<li>
				<b><a href="<?= base_url(); ?>login_ldap/logout">Logout</a></b>
			</li>
			<br/><br/>


		</ul>
	</div>
	<!-- /#sidebar-wrapper -->
