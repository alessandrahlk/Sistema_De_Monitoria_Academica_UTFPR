<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <hr>
    <div class="col-sm-12">

      <h4>Primeiro acesso</h4><br/>

      <form action="<?= base_url(); ?>cadastro/inserir" method="POST" enctype="multipart/form-data">
      <b>  Nome:</b> <?php $user = $this->session->userdata('nome'); echo $user; ?><br/>
      <b>  Login: </b><?php $user = $this->session->userdata('login'); echo $user; ?><br/>
      <b>  Tipo: </b><?php $user = $this->session->userdata('tipo'); if($user=='5') echo "Aluno"; else echo "Professor/Servidor" ?><br/><br/>

        <label class="mr-sm-2" for="inlineFormCustomSelect">Departamento</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="nome_dep" id="nome_dep" required>
          <option selected value="">Selecione...</option>
          <option value="DACOM">DACOM</option>
          <option value="DAELE">DAELE</option>
          <option value="DAMEC">DAMEC</option>
          <option value="DAMAT">DAMAT</option>
          <option value="DACIN">DACIN</option>
          <option value="nenhum">Sem departamento</option>
        </select>

        <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="tipo" id="tipo" required>
          <option selected value="">Selecione...</option>
          <option value="1">Coordenador</option>
          <option value="2">Chefe de departamento</option>
          <option value="3">Diretoria de graduação</option>
          <option value="4">DEPED</option>
        </select><br/><br/>

        <input type="hidden" name="status" id="status" value="Inativo"/>
        <input type="hidden" name="login" id="login" value="<?=$this->session->userdata('login');?>"/>
        <input type="hidden" name="nome" id="nome" value="<?=$this->session->userdata('nome');?>"/>
        <button type="submit" value="0" class="btn btn-default">Submit</button>

      </form><br/><br/>
    </div>
