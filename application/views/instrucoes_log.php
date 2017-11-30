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
		Servidores e alunos, façam primeiramente o <a href="<?= base_url(); ?>login_ldap">Login</a> para ter acesso ao sistema. Em caso de dúvida entrar em contato com - <u>@</u>.<br/><br/>
      <h4>Instruções</h4><br/>

      <ol>
        <li>
          DEPED atribui as datas e número de bolsas por departamento.
        </li>
        <li>
          Coordenadores indicam disciplinas de monitoria, seus pré-requisitos, equivalentes, número de bolsistas e voluntários. Para adicionar equivalentes e pré-requisitos clique no botão: editar pré-requisito/equivalente.
        </li>
        <li>
          Chefe de departamento aprova número de bolsas por disciplina (final da página Relatório final).
        </li>
        <li>
          Diretoria de graduação aprova a minuta de edital (final da página Relatório final).
        </li>
      </ol>
    </div>
