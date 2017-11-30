<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2> Prazo: 
    <?php $user=$this->session->userdata('tipo');
        if($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim))." 00:00:00";
         else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim))." 00:00:00";
         else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim))." 00:00:00";
         else if($user == "4" ) echo "---";
         else echo "---";?>

         Faltam:
         <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.


    <hr><div class="col-12">

      <h4>Edição da disciplina <u><?=$disciplina[0]->codigo ?></u>.</h4>
      Observação: preencha somente os campos que deseja alterar.<br/><br/>


      <form action="<?= base_url(); ?>coordenacao/salvar_edicao" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="codigo" id="codigo" value="<?=$disciplina[0]->codigo ?>"/>
        <div class="form-group">
          <label for="formGroupExampleInput2">Nome da disciplina</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome" name="nome" placeholder="Insira o nome da disciplina.">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Nome do orientador</label>
          <input  type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="orientador" name="orientador" placeholder="Insira o nome do orientador." >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Número de bolsistas</label>
          <input  type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="n_bolsistas" name="n_bolsistas" placeholder="Insira o número de bolsistas." >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Número de voluntários</label>
          <input  type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="n_voluntarios" name="n_voluntarios" placeholder="Insira o número de voluntários." >
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form><br/><a href="<?= base_url(); ?>coordenacao"><h5>Voltar</h5></a></div><br/>
