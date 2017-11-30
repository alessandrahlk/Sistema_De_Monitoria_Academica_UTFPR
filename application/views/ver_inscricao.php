
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
      <h4>Inscrições realizadas</h4><br/>

      <table class="table">
        <tr>
          <th>
            Disciplina
          </th>
          <th>
            Equivalente utilizada
            <th>
              Nota na disciplina
            </th>
            <th>
              Coeficiente
            </th>
            <th>
              Pré-requisitos
            </th>
            <th>
              Notas dos pré-requisitos
            </th>
            <th>
              Média final
            </th>
            <th>
              Verificação
            </th>
          </tr>
          <?php ini_set('mssql.charset', 'UTF-8'); foreach($inscricoes_user as $ins){?>
          <tr>
            <td>
              <?= $ins->disciplina; ?>
            </td>
            <td>
              <?php if($ins->equivalente=="") echo "---"; else echo $ins->equivalente;?>
            </td>
            <td>
              <?= $ins->nota; ?>
            </td>
            <td>
              <?= $ins->coeficiente/10; ?>
            </td>
            <td>
              <?= $ins->pre_requisitos; ?>
            </td>
            <td>
              <?= $ins->notas_pre; ?>
            </td>
            <td>
              <?= $ins->media; ?>
            </td>
            <td>
              <?= $ins->verificacao; ?>
            </td>
            <td>
              <center>
                <a href="<?= base_url('ver_inscricao/excluir/'.$ins->disciplina.'/'.$ins->equivalente)?>" class="btn btn-danger btn-sm"  onclick="return confirm('Deseja realmente a inscrição?');">Excluir</a></center>

            </td>
          </tr>
          <?php }?>
        </table></div>
