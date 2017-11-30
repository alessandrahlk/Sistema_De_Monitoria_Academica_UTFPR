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
    else if($user == "5")  echo date('d/m/Y', strtotime($datas[3]->fim));
    else echo "---";?>

    00:00:00 Faltam:
    <div class ="box" id="clock<?=$this->session->userdata('tipo');?>"></div> <strong>Importante:</strong> após o prazo não será mais possível fazer alterações.
    <hr>
    <div class="col-12">
      <h4>Adicionar Notas</h4><br/>

      <?php if ($codigo==""){
        echo "<b>Disciplina: ".$disciplina." - ".$nome_disciplina[0]->nome."</b>";
      }
      else{
        echo "<b>Disciplina: ".$codigo." - ".$nome_equivalente[0]->nome_eq."</b>";
      }?>
      <br/><br/>

      <form action="<?= base_url(); ?>inscricoes/salvar" method="POST" enctype="multipart/form-data">
        <div class="form-group"><div class="form-group">
          <label for="formGroupExampleInput">Nota da disciplina <?=$disciplina?> </label>
          <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0 col-2" id="nota" name="nota" placeholder="Insira a nota da disciplina." min="0" max="10" step="0.01" required>
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput">Coeficiente</label>
          <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0 col-2" id="coeficiente" name="coeficiente" placeholder="Insira seu coeficiente." min="0" max="0.9999" step="0.0001" required>
        </div>

        <?php $i="0"; if($codigo==""){foreach ($pre_requisito as $pre) {?>
          <div class="form-group">
            <label for="formGroupExampleInput">Nota do pré-requisito <?=$pre->codigo_pre?> - <?=$pre->nome_pre?> </label>
            <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0 col-2" id="nota_pre<?=$i?>" name="notas_pre<?=$i?>" placeholder="Insira a nota do pré-requsito." min="0" max="10" step="0.01" required>
          </div>
          <input type="hidden" name="pre_requisito<?=$i?>" id="pre_requisito<?=$i?>" value="<?=$pre->codigo_pre;?>"/>
          <?php $i =$i+1;?>
        <?php }}
      else{foreach ($pre_requisito as $pre) {if ($pre->cod_pre_eq != ""){?>
            <div class="form-group">
              <label for="formGroupExampleInput">Nota do pré-requisito <?=$pre->cod_pre_eq?> - <?=$pre->nome_pre_eq?> </label>
              <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0 col-2" id="notas_pre<?=$i?>" name="notas_pre<?=$i?>" placeholder="Insira a nota do pré-requsito." min="0" max="10" step="0.01" required>
            </div>
            <input type="hidden" name="pre_requisito<?=$i?>" id="pre_requisito<?=$i?>" value="<?=$pre->cod_pre_eq;?>"/>
            <?php $i =$i+1;?>
      <?php }}}?>
        <input type="hidden" name="login" id="login" value="<?=$this->session->userdata('login');?>"/>
        <input type="hidden" name="disciplina" id="disciplina" value="<?=$disciplina;?>"/>
        <input type="hidden" name="i" id="i" value="<?=$i;?>"/>
        <input type="hidden" name="equivalente" id="equivalente" value="<?=$codigo;?>"/>
        <button type="submit" value="" class="btn btn-default">Submit</button>
      </form>
