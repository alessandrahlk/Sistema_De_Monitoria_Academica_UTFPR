
<div id="page-content-wrapper">
  <div class="container-fluid">

    <h2>Sistema de Seleção de Monitores</h2> 
    <hr>
    <div class="col-sm-6">
      <h4>Atribuição de bolsas por departamento</h4>
      Para alterar, insira novamente o número de bolsas do determinado departamento.<br/><br>

      <form class="" action="<?= base_url(); ?>n_bolsas/salvar" method="POST" enctype="multipart/form-data">

        <label class="mr-sm-2 mb-0" for="inlineFormCustomSelect">Departamento</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="departamento" id="departamento" required>
          <option selected value="">Selecione...</option>
          <option value="DACOM">DACOM</option>
          <option value="DAELE">DAELE</option>
          <option value="DAMEC">DAMEC</option>
          <option value="DAMAT">DAMAT</option>
          <option value="DACIN">DACIN</option>
        </select><br/><br/>

        <div class="form-group row">
          <label  class="col-3 col-form-label">Número de bolsistas</label>
          <div class="col-2">
            <input class="form-control" type="number" name="n_bol" id="n_bol" required>
          </div>
        </div>

        <div class="form-group row">
          <label  class="col-3 col-form-label">Número de voluntários</label>
          <div class="col-2">
            <input class="form-control" type="number" name="n_vol" id="n_vol" required>
          </div>
        </div>

        <button type="submit" value="cadastrar" class="btn btn-default">Submit</button>
      </form><br/></div>

      <div class="col-sm-12">
        Tabela: Número de bolsas por departamento.
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
            <?php ini_set('mssql.charset', 'UTF-8'); foreach($n_bolsas as $bolsas){?>
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
              <?php }?>
            </table>
          </div>
