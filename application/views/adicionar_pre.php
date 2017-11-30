<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>Prazo:
    <?php $user=$this->session->userdata('tipo');
        if($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim))." 00:00:00";
         else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim))." 00:00:00";
         else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim))." 00:00:00";
         else if($user == "4" ) echo "---";
         else echo "---";?>

         Faltam:
         <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
    
    <hr>
    <div class="col-12">
      <h4>Edição de pré-requisitos</h4><br/>

      <strong>Tabela: Pré-requistos de <?=$disciplina[0]->codigo?>.</strong>
      <table class="table ">
        <tr><th>
          Código pré-requisito
        </th>
        <th>
          Nome pré-requisito
        </th>
      </tr>
      <?php ini_set('mssql.charset', 'UTF-8'); foreach($pre_requisito as $pre){?>
        <tr>
          <td>
            <?= $pre->codigo_pre; ?>
          </td>
          <td>
            <?= $pre->nome_pre; ?>
          </td>

          <td>
            <center><form action="<?= base_url(); ?>coordenacao/excluir_pre/<?=$disciplina[0]->codigo?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="excluir_codigo_pre" id="excluir_codigo_pre" value="<?=$pre->codigo_pre?>"/>
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir o pré-requisito?');">Excluir</a></center></form>
              </td>

            <?php }?>
          </tr>
        </table><br/>

      </div>

      <div class="col-12">

        <form action="<?= base_url(); ?>coordenacao/salvar_pre/<?=$disciplina[0]->codigo?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="codigo_disciplina" id="codigo_disciplina" value="<?=$disciplina[0]->codigo?>"/>
          <div class="form-group">
            <label for="formGroupExampleInput2">Código do pré-requisito</label>
            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="codigo_pre" name="codigo_pre" placeholder="Insira o código da disciplina equivalente." required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Nome do pré-requisito</label>
            <input  type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome_pre" name="nome_pre" placeholder="Insira o nome da disciplina equivalente." required>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form><br/><a href="<?= base_url(); ?>coordenacao"><h5>Voltar</h5></a><br/></div><br/>
