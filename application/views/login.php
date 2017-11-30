<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <hr>
    <div class="col-sm-12">
      <h4>Logar</h4><br/>

      <form action="<?= base_url(); ?>login/logar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="formGroupExampleInput2">Login</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="login" id="login" placeholder="Insira seu login." required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Senha</label>
          <input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" name="senha" id="senha" placeholder="Insira sua senha." required>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>

      </form><br/>
    </div>
    <div class="col-sm-3">
      <h5><a href="<?= base_url(); ?>cadastro"> Cadastrar-se.</a></h5></div>
    </div>
