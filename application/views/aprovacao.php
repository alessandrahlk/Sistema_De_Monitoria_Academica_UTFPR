<div class="col-sm-12">
  <h4>Aprovação</h4><br/>
  <form action="<?= base_url(); ?>verificacao/salvar_chefdep" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="tipo" id="tipo" value="<?= $user = $this->session->userdata('tipo');?>"/>
    <input type="hidden" name="login" id="login" value="<?=$this->session->userdata('login');?>"/>

    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="aprovacao" id="aprovacao" required>
      <option selected value="">Selecione...</option>
      <option value="0">Desaprova</option>
      <option value="1">Aprova</option>
    </select><br/><br/>
    <label for="formGroupExampleInput2">Observação</label>
    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="obs" name="obs" placeholder="Caso desaprovado, escreva o motivo." >
    <br/><button type="submit" class="btn btn-default">Submit</button>
  </form><br/></div>
