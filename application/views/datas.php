
<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <hr>
    <div class="col-sm-6">

      <h4>Atribuição de datas</h4>
      Para alterar, insira novamente as datas.<br/><br>

      1. (<u>Coordenação</u>) Prazo para indicação de disciplinas e orientadores.</b><br/><br/>
      <form action="<?= base_url(); ?>datas/salvar" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="login" id="login" value="<?=$this->session->userdata('login');?>"/>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Início</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="inicio" id="inicio" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim" id="fim" required>
          </div>
        </div>

        2. (<u>Chefe de Departamento</u>) Prazo para avaliação do número de bolsas.<br/><br/>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Início</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="inicio2" id="inicio2" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim2" id="fim2" required>
          </div>
        </div>

        3. (<u>Diretoria de Graduação</u>) Publicação do edital.<br/><br/>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Início</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="inicio3" id="inicio3" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim3" id="fim3" required>
          </div>
        </div>

        4. (<u>Alunos</u>) Prazo para inscrições.<br/><br/>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Início</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="inicio4" id="inicio4" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim4" id="fim4" required>
          </div>
        </div>

        4. (<u>Alunos</u>) Data de publicação do resultado.<br/><br/>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim5" id="fim5" required>
          </div>
        </div>

        4. (<u>Alunos</u>) Prazo para entrar com recurso.<br/><br/>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Início</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="inicio6" id="inicio6" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Fim</label>
          <div class="col-4">
            <input class="form-control" type="date" value="2017-08-19" name="fim6" id="fim6" required>
          </div>
        </div>

        <button type="submit" value="cadastrar" class="btn btn-default">Submit</button>
        <input type="hidden" name="cadastrar" value="register"/></form>
        <br/><br/></div>
        <div class="col-sm-12">

          Tabela: Atribuição de datas.

          <table class="table ">
            <tr>
              <th>
                id
              </th>
              <th>
                Nome
                <th>
                  Data início
                </th>
                <th>
                  Data fim
                </th>
              </tr>
              <?php ini_set('mssql.charset', 'UTF-8'); foreach($datas as $date){?>
                <tr>
                  <td>
                    <?= $date->id; ?>
                  </td>
                  <td>
                    <?= $date->nome; ?>
                  </td>
                  <td>
                    <?php if($date->inicio != "0000-00-00 00:00:00") echo date('d/m/Y', strtotime($date->inicio)); else echo"-------------"; ?>
                  </td>
                  <td>
                    <?= date('d/m/Y', strtotime($date->fim)); ?>
                  </td>

                <?php }?>
              </table>
              <br/>

            </div>
