
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
      <h4>Inscrição na disciplina</h4><br/>
      <form action="<?= base_url(); ?>inscricoes/adicionar_notas" method="POST" enctype="multipart/form-data">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Selecione o código da disciplina ou equivalente de <?=$disciplina[0]->codigo?></label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="codigo" id="codigo" required>
        <option selected value="">Selecione...</option>
        <option value="<?=$disciplina[0]->codigo?>"><?=$disciplina[0]->codigo?></option>
        <?php foreach($disciplina_equivalente as $c){ ?>
        <option value="<?=$c->codigo_eq?>"><?php echo $c->codigo_eq;?></option>
        <?php }?>
      </select>
        <input type="hidden" name="disciplina" id="disciplina" value="<?=$disciplina[0]->codigo?>"/>
      <button type="submit" value="0" class="btn btn-default">Submit</button>
    </form>
