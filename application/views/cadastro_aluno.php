
<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <hr>
    <div class="col-sm-12">

      <h4>Primeiro acesso</h4><br/>

      <form action="<?= base_url(); ?>cadastro_aluno/inserir" method="POST" enctype="multipart/form-data">
      <b>  Nome:</b> <?php $user = $this->session->userdata('nome'); echo $user; ?><br/>
      <b>  RA: </b><?php $user = $this->session->userdata('login'); echo $user; ?><br/>
      <b>  Tipo: </b><?php $user = $this->session->userdata('tipo'); if($user=='5') echo "Aluno"; else echo "Professor/Servidor" ?><br/><br/>

        <label class="mr-sm-2" for="inlineFormCustomSelect">Curso</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="curso" id="curso" required>
          <option selected value="">Selecione...</option>
          <option value="Engenharia de Computação">Engenharia de Computação</option>
          <option value="Engenharia Elétrica">Engenharia Elétrica</option>
          <option value="Engenharia de Software">Engenharia de Software</option>
          <option value="Engenharia Eletrônica">Engenharia Eletrônica</option>
          <option value="Engenharia Mecânica">Engenharia Mecânica</option>
          <option value="Licenciatura em Matemática">Licenciatura em Matemática</option>
        </select>

        <input type="hidden" name="status" id="status" value="Ativo"/>
        <input type="hidden" name="login" id="login" value="<?=$this->session->userdata('login');?>"/>
        <input type="hidden" name="nome" id="nome" value="<?=$this->session->userdata('nome');?>"/>
        <button type="submit" value="0" class="btn btn-default">Submit</button>

      </form><br/><br/>

    </div>
