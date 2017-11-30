<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <span id="future_date"></span>
    Prazo:
    <?php $user=$this->session->userdata('tipo');
    if($user=="1") echo date('d/m/Y', strtotime($datas[0]->fim));
    else if($user == "2") echo date('d/m/Y', strtotime($datas[1]->fim));
    else if($user == "3")  echo date('d/m/Y', strtotime($datas[2]->fim));
    else if($user == "4" ) echo "---";
    else echo "---";?>

    00:00:00 Faltam:
    <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
    <hr>
    <div class="col-12">
      <h4>Indicação de disciplinas e orientadores</h4><br/>



      <?php $user = $this->session->userdata('departamento');?>

      Tabela: Número de bolsas em: <?php echo $user;?>.
      <table class="table">
        <tr>
          <th>
            Departamento
            <th>
              Número de bolsistas
            </th>
            <th>
              Número de voluntários
            </th>
          </tr>
          <?php ini_set('mssql.charset', 'UTF-8'); foreach($n_bolsas as $bolsas){ if($bolsas->departamento == $user){?>
            <tr>
              <td>
                <?= $bolsas->departamento; ?>
              </td>
              <td>
                <?= $bolsas->n_bol; ?>
              </td>
              <td>
                <?= $bolsas->n_vol; ?>
              </td>
            <?php }}?>
          </table><br/>


          Tabela: Disciplinas incluídas em: <?php echo $user;?>.
          <table class="table ">
            <tr>
              <th>
                Código
                <th>
                  Nome
                </th>
                <th>
                  Orientador
                </th>
                <th>
                  Número de bolsistas
                </th>
                <th>
                  Número de voluntários
                </th>
                <th>
                  Equivalentes
                </th>
                <th>
                  Pré-requisitos
                </th>
              </tr>
              <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){?>
                <tr>
                  <td>
                    <?= $d->codigo ?>
                  </td>
                  <td>
                    <?= $d->nome; ?>
                  </td>
                  <td>
                    <?= $d->orientador; ?>
                  </td>
                  <td>
                    <?= $d->n_bolsistas; ?>
                  </td>
                  <td>
                    <?= $d->n_voluntarios; ?>
                  </td>
                  <td>

                    <?php
                    $array = array(); //limpa o array em todos os loops
                    foreach($coluna1 as $c){
                      if($c->disciplina == $d->codigo) {
                      $array[] = $c->codigo_eq; }} //armazena em um array só os códifos com $c->disciplina == $d->codigo

                      $result = array_unique($array); //tira os valores repetidos
                      //print_r($result);

                    foreach($result as $r){
                      echo $r.'<br/>';
                    }
                      ?>

                    </td>
                    <td>
                      <?php foreach($pre_requisito as $p){if($p->codigo_disciplina == $d->codigo){
                        echo ''.$p->codigo_pre.'<br/>'; }}
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('coordenacao/adicionar_equivalente/'.$d->codigo) ?>" class="btn btn-primary btn-sm">Editar<br/> equivalente</a>
                      </td>
                      <td>
                        <center>
                          <a href="<?= base_url('coordenacao/adicionar_pre/'.$d->codigo) ?>" class="btn btn-primary btn-sm">Editar<br/> pré-requisito</a></center>
                        </td>
                        <td>
                          <center>
                            <a href="<?= base_url('coordenacao/editar/'.$d->codigo) ?>" class="btn btn-primary btn-sm">Editar<br/> disciplina</a></center>
                          </td>
                          <td>
                            <center>
                              <a href="<?= base_url('coordenacao/excluir/'.$d->codigo) ?>" class="btn btn-danger btn-sm"  onclick="return confirm('Deseja realmente excluir a disciplina?');">Excluir</a></center>
                            </td>
                          <?php }?>
                        </table><br/>

                        <form action="<?= base_url(); ?>coordenacao/salvar" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="formGroupExampleInput">Código da disciplina</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="codigo" name="codigo" placeholder="Insira o código da disciplina." required>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Nome da disciplina</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome" name="nome" placeholder="Insira o nome da disciplina." required>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Nome do orientador</label>
                            <input  type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="orientador" name="orientador" placeholder="Insira o nome do orientador." required>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Número de bolsistas</label>
                            <input  type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="n_bolsistas" name="n_bolsistas" placeholder="Insira o número de bolsistas." required>
                          </div>
                          <div class="form-group">
                            <label for="formGroupExampleInput2">Número de voluntários</label>
                            <input  type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="n_voluntarios" name="n_voluntarios" placeholder="Insira o número de voluntários." required>
                          </div>
                          <button type="submit" value="cadastrar" class="btn btn-default">Submit</button>
                        </form></div><br/>
