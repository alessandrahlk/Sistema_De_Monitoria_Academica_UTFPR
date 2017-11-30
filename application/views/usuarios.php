<?php error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);?>
<div id="page-content-wrapper">
  <div class="container-fluid">
    <h2>Sistema de Seleção de Monitores</h2>
    <hr>

    <div class="col-md-12">
      <h4>Usuários</h4>
      Para o usuário poder logar, atualize seu status para "Ativo". Caso o usuário for um coordenador, adicione o mesmo na tabela de coordenadores pelo botão "Inserir Coordenador".<br/>
      Tipo 1 = coordenador / Tipo 2 = Chefe de departamento / Tipo 3 = Diretoria de graduação / Tipo 4 = DEPED.<br/><br/>
      <strong>Tabela: Usuários cadastrados.</strong>
      <table class="table">
        <tr>
          <th>
            Nome
            <th>
              Login
            </th>
            <th>
              Departamento
            </th>
            <th>
              Tipo
            </th>
            <th>
              Status
            </th>
          </tr>
          <?php ini_set('mssql.charset', 'UTF-8'); foreach($dadosuser as $user){?>
            <tr>
              <td>
                <?= $user->nome; ?>
              </td>
              <td>
                <?= $user->login; ?>
              </td>
              <td>
                <?= $user->nome_dep; ?>
              </td>
              <td>
                <?= $user->tipo; ?>
              </td>
              <td>
                <?= $user->status; ?>
              </td>
              <td>
                <center>
                  <a href="<?= base_url('usuarios/atualizar/'.$user->login) ?>" class="btn btn-primary btn-sm">Editar</a></center>
                </td>
                <td>
                  <center>
                    <a href="<?= base_url('usuarios/adicionar_coordenador/'.$user->login) ?>" class="btn btn-primary btn-sm">Incluir Coordenador</a></center>
                  </td>
                  <td>
                    <center>
                      <a href="<?= base_url('usuarios/excluir/'.$user->login) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir o usuário?');">Excluir</a></center>
                    </td>
                  </tr>
                <?php }?>
              </table><br/>
              <h4>Coordenadores</h4><br/>
              <strong>Tabela: Coordenadores.</strong>

              <table class="table">
                <tr>
                  <th>
                    login
                    <th>
                      departamento
                    </th>
                  </tr>
                  <?php ini_set('mssql.charset', 'UTF-8'); foreach($dadoscoor as $coor){?>
                    <tr>
                      <td>
                        <?= $coor->login; ?>
                      </td>
                      <td>
                        <?= $coor->departamento; ?>
                      </td>
                      <td>
                        <center>
                          <a href="<?= base_url('usuarios/excluir_coordenador/'.$coor->login) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir o coordenador?');">Excluir</a></center>
                        </td>
                      </tr>
                    <?php }?>
                  </table><br/>
                </div>
