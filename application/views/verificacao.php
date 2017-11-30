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
    <div class="col-sm-12">
      <h4>Relatório final</h4><br/>

      Tabela: Atribuição de datas.

      <table class="table">
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

          Tabela: Número de bolsas por departamento.
          <table class="table ">
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
              </table><br/>

              Tabela: Disciplinas incluídas em DACOM.
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
                        <?php }}?>
                      </table><br/>

                    Tabela: Disciplinas incluídas em DAELE.
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
                                <?php foreach($disciplina_equivalente as $de){if($de->disciplina == $d->codigo){
                                  echo ''.$de->codigo_eq.'<br/>'; }}
                                  ?>
                                </td>
                                <td>
                                  <?php foreach($pre_requisito as $p){if($p->codigo_disciplina == $d->codigo){
                                    echo ''.$p->codigo_pre.'<br/>'; }}
                                    ?>
                                  </td>
                                <?php }}?>
                              </table><br/>

                              Tabela: Disciplinas incluídas em DAMEC.
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
                                        <?php foreach($disciplina_equivalente as $de){if($de->disciplina == $d->codigo){
                                          echo ''.$de->codigo_eq.'<br/>'; }}
                                          ?>
                                        </td>
                                        <td>
                                          <?php foreach($pre_requisito as $p){if($p->codigo_disciplina == $d->codigo){
                                            echo ''.$p->codigo_pre.'<br/>'; }}
                                            ?>
                                          </td>
                                        <?php }}?>
                                      </table><br/>

                                      Tabela: Disciplinas incluídas em DAMAT.
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
                                                <?php foreach($disciplina_equivalente as $de){if($de->disciplina == $d->codigo){
                                                  echo ''.$de->codigo_eq.'<br/>'; }}
                                                  ?>
                                                </td>
                                                <td>
                                                  <?php foreach($pre_requisito as $p){if($p->codigo_disciplina == $d->codigo){
                                                    echo ''.$p->codigo_pre.'<br/>'; }}
                                                    ?>
                                                  </td>
                                                <?php }}?>
                                              </table><br/>

                                              Tabela: Disciplinas incluídas em DACIN.
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
                                                        <?php foreach($disciplina_equivalente as $de){if($de->disciplina == $d->codigo){
                                                          echo ''.$de->codigo_eq.'<br/>'; }}
                                                          ?>
                                                        </td>
                                                        <td>
                                                          <?php foreach($pre_requisito as $p){if($p->codigo_disciplina == $d->codigo){
                                                            echo ''.$p->codigo_pre.'<br/>'; }}
                                                            ?>
                                                          </td>
                                                        <?php }}?>
                                                      </table><br/>


                                                      <h4>Situação</h4><br/>

                                                      <table class="table ">
                                                        <tr>
                                                          <th>
                                                            Usuário
                                                          </th>
                                                          <th>
                                                            Aprovação
                                                            <th>
                                                              Observação
                                                            </th>
                                                          </tr>
                                                          <?php ini_set('mssql.charset', 'UTF-8'); foreach($aprovacao as $a){?>
                                                            <tr>
                                                              <td>
                                                                <?php if ($a->tipo=='2') echo "Chefe de departamento";
                                                                else if ($a->tipo=='3') echo "Diretoria de graduação" ?>
                                                              </td>
                                                              <td>
                                                                <?php if ($a->aprovacao=='0') echo '<p class="text-danger"><b>Desaprovado</b></p>';
                                                                else if ($a->aprovacao=='1') echo '<p class="text-success"><b>Aprovado</b></p>'; ?>
                                                              </td>
                                                              <td>
                                                                <?= $a->obs; ?>
                                                              </td>

                                                            <?php }?>
                                                          </table>




                                                        </div>
