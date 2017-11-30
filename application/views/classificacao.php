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
    else if($user == "5" ) echo date('d/m/Y', strtotime($datas[3]->fim));
    else echo "---";?>

    00:00:00 Faltam:
    <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
    <hr>
    <div class="col-12">
      <h4>Classificação</h4><br/>

      Tabela: Classificação da disciplina EC33C.
      <table class="table">
        <tr>
          <th>
            Login
          </th>
          <th>
            Média
            <th>
              Classificação
            </th>
          </tr>
          <?php $cont=1; foreach($classificacao as $c){if($c->disciplina=="EC33C"){?>
          <tr>
            <td>
              <?= $c->login; ?>
            </td>
            <td>
              <?= $c->media; ?>
            </td>
            <td>
              <?=$cont;?>
            </td>
          </tr>
          <?php $cont++;}}?>
        </table></div>
