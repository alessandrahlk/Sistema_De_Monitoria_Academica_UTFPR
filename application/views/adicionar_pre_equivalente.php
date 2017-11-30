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
      <h4>Edição de disciplinas pré-requisitos de equivalente</h4><br/>

      <strong>Tabela: Pré-requisitos de <?= $disciplina_equivalente[0]->codigo_eq?>.</strong>
      <table class="table">
        <tr><th>
          Código do pré-requisito
        </th>
        <th>
          Nome do pré-requisito
        </th>
      </tr>
      <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina_equivalente as $d){ if ($d->cod_pre_eq!=""){ ?>
        <tr>
          <td>
            <?= $d->cod_pre_eq; ?>
          </td>
          <td>
            <?= $d->nome_pre_eq; ?>
          </td>
          <td>
            <center><form action="<?= base_url(); ?>coordenacao/excluir_pre_equivalente/<?=$this->uri->segment(3);?>/<?=$this->uri->segment(4);?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="excluir" id="excluir" value="<?=$d->cod_pre_eq;?>"/>
              <button  type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir o pré-requisito?');">Excluir</a></center></form>
              </td>

            <?php }}?>
          </tr>
        </table><br/>

      </div>

      <div class="col-12">

        <form action="<?= base_url(); ?>coordenacao/salvar_pre_equivalente/<?=$this->uri->segment(3);?>/<?=$this->uri->segment(4);?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="codigo_eq" id="codigo_eq" value="<?=$disciplina_equivalente[0]->codigo_eq?>"/>
          <input type="hidden" name="nome_eq" id="nome_eq" value="<?=$disciplina_equivalente[0]->nome_eq?>"/>
          <div class="form-group">
            <label for="formGroupExampleInput2">Código do pré-requisito</label>
            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="codigo_pre" name="codigo_pre" placeholder="Insira o código do pré-requisito." required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Nome da pré-requisito</label>
            <input  type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome_pre" name="nome_pre" placeholder="Insira o nome do pré-requisito." required>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form><br/><a href="<?= base_url(); ?>coordenacao/adicionar_equivalente/<?= $disciplina_equivalente[0]->disciplina?>"><h5>Voltar</h5></a><br/></div><br/>
