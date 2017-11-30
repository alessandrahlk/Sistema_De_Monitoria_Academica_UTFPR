<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    Prazo: <?php $user=$this->session->userdata('tipo');
          if($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim))." 00:00:00";
           else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim))." 00:00:00";
           else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim))." 00:00:00";
           else if($user == "4" ) echo "---";
           else echo "---";?>

      		 Faltam:
      		 <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
    <hr>
    <div class="col-12">
      <h4>Edição de disciplinas equivalentes</h4><br/>
      <strong>Tabela: Disciplinas equivalentes de <u><?=$disciplina[0]->codigo?></u>.</strong>
      <table class="table">
        <tr><th>
          Código disciplina equivalente
        </th>
        <th>
          Nome disciplina equivalente
        </th>
        <th>
          Pré-requisitos
        </th>
      </tr>
     <?php
        if (!empty($coluna1)){
          foreach($coluna1 as $c){ ?>
        <tr>
          <td>
            <?php echo $c->codigo_eq; ?>
          </td>
          <td>
            <?php echo $c->nome_eq;  ?>
          </td>
          <td>
            <?php foreach($disciplina_equivalente as $d){
            if($d->codigo_eq == $c->codigo_eq){
            echo $d->cod_pre_eq."<br/>";}
             }?>
          </td>
          <td>
            <center>
            <a href="<?= base_url('coordenacao/adicionar_pre_equivalente/'.$disciplina[0]->codigo.'/'.$c->codigo_eq) ?>" class="btn btn-primary btn-sm">Editar<br/>pré-requisito</a></center>
          </td>
          <td>
            <center><form action="<?= base_url(); ?>coordenacao/excluir_equivalente/<?=$disciplina[0]->codigo?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="excluir_codigo_eq" id="excluir_codigo_eq" value="<?=$d->codigo_eq?>"/>
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir a equivalente?');">Excluir</a></center></form>
              </td>

            <?php }
            }else echo "<tr></tr>";?>
          </tr>
        </table><br/>

      </div>

      <div class="col-12">

        <form action="<?= base_url(); ?>coordenacao/salvar_equivalente/<?=$disciplina[0]->codigo?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="codigo_disciplina" id="codigo_disciplina" value="<?=$disciplina[0]->codigo?>"/>
          <div class="form-group">
            <label for="formGroupExampleInput2">Código da disciplina equivalente</label>
            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="codigo_eq" name="codigo_eq" placeholder="Insira o código da disciplina equivalente." required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Nome da disciplina equivalente</label>
            <input  type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome_eq" name="nome_eq" placeholder="Insira o nome da disciplina equivalente." required>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form><br/><a href="<?= base_url(); ?>coordenacao"><h5>Voltar</h5></a><br/></div><br/>
