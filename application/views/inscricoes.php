
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
      <h4>Inscrição</h4><br/>

      Tabela: Disciplinas disponíveis em DACOM.
      <table class="table">
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
          <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){ if($d->departamento == 'DACOM'){?>
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
                    <td><a href="<?= base_url('inscricoes/escolha_disciplina/'.$d->codigo) ?>" class="btn btn-danger btn-sm">Inscrever-se</a></center></td>
                <?php }}?>
              </tr>
              </table><br/>

            Tabela: Disciplinas disponíveis em DAELE.
              <table class="table">
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
                  <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){ if($d->departamento == 'DAELE'){?>
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
                          <td><a href="<?= base_url('inscricoes/escolha_disciplina/'.$d->codigo) ?>" class="btn btn-danger btn-sm">Inscrever-se</a></center></td>
                        <?php }}?>
                      </table><br/>

                      Tabela: Disciplinas disponíveis em DAMEC.
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
                          <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){ if($d->departamento == 'DAMEC'){?>
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
                                  <td><a href="<?= base_url('inscricoes/escolha_disciplina/'.$d->codigo) ?>" class="btn btn-danger btn-sm">Inscrever-se</a></center></td>
                                <?php }}?>
                              </table><br/>

                              Tabela: Disciplinas disponíveis em DAMAT.
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
                                  <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){ if($d->departamento == 'DAMAT'){?>
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
                                          <td><a href="<?= base_url('inscricoes/escolha_disciplina/'.$d->codigo) ?>" class="btn btn-danger btn-sm">Inscrever-se</a></center></td></tr>
                                        <?php }}?>
                                      </table><br/>

                                      Tabela: Disciplinas disponíveis em DACIN.
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
                                          <?php ini_set('mssql.charset', 'UTF-8'); foreach($disciplina as $d){ if($d->departamento == 'DACIN'){?>
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
                                                  <td><a href="<?= base_url('inscricoes/escolha_disciplina/'.$d->codigo) ?>" class="btn btn-danger btn-sm">Inscrever-se</a></center></td>
                                                <?php }}?>
                                              </table><br/>





    </div>
