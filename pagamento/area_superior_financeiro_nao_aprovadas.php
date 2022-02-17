<!DOCTYPE html>
  <html>
  <?php
    session_start();
    if (empty($_SESSION['email'])) {
        header('location:login.php');
    }
    include_once 'menu.php';
    include_once 'config.php';
    $sql = "SELECT *
  FROM solicitacao_pagamento.solicitacao as s
  INNER JOIN solicitacao_pagamento.favorecido as f ON s.favorecido_id_favorecido = f.id_favorecido
  INNER JOIN solicitacao_pagamento.aprovacao as a
  ON s.id_solicitacao = a.solicitacao_id_solicitacao
  WHERE a.aprovacao0 = 'nao_autorizada' OR a.aprovacao1 = 'nao_autorizada' 
  OR a.aprovacao2 = 'nao_autorizada' OR a.aprovacao3 = 'nao_autorizada'
  OR a.aprovacao4 = 'nao_autorizada' OR a.aprovacao5 = 'nao_autorizada'";




    $result = $link->query($sql);
    ?>
  <div class='row' style="width: 100%;">
      <div class='col-1'>
      </div>
      <div class='col-10'>
          <div class='mt-4'>
          </div>
          <div class='row'>
              <div class='col-6'>
                  <nav aria-label="...">
                      <ul class="pagination ">
                          <li class="page-item">
                              <a class="page-link" href="area_supervisor_financeiro.php" tabindex="-1">Não Aprovada</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="area_superior_financeiro_aprovadas.php">Aprovada</a></li>
                          <li class="page-item"><a class="page-link" href="area_superior_financeiro_nao_aprovadas.php">Não Autorizada</a>
                          </li>
                      </ul>
                  </nav>

              </div>
              <div class='col-6'>
                  <form class="d-flex" method="POST" action="pesquisar.php">
                      <input class="form-control me-2" name="pesquisar" type="search" placeholder="Perquisar Por Número de Protocolo" aria-label="Search">
                      <button class="btn btn-success" type="submit">Pesquisar</button>
                  </form>
              </div>
          </div>

          <div class="badge bg-dark" style="width: 100%;">

              <h1>Área do Superior Financeiro Não Aprovadas.</h1>
          </div>
          <table class="table  table-hover">
              <thead class=''>
                  <tr class="table-active borda">
                      <th scope="col">Número Protocolo</th>
                      <th scope="col">Favorecido</th>
                      <th scope="col">Data Solicitação</th>
                      <th scope="col">Forma de Pagamento</th>
                      <th scope="col">Vencimento</th>
                      <th scope="col">Observação</th>
                      <th scope="col">Visualizar</th>
                  </tr>
              </thead>
              <tbody>

                  <?php

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['aprovacao0'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } elseif ($row['aprovacao1'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } elseif ($row['aprovacao2'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } elseif ($row['aprovacao3'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } elseif ($row['aprovacao4'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } elseif ($row['aprovacao5'] == 'nao_autorizada') {
                                echo "<tr class='table-danger'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
                                echo "<th>" . $row['nome_favorecido'] . "</th>";
                                echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
                                echo "<th>" . $row['valor'] . "</th>";
                                echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])) . "</th>";
                                echo "<th>" . $row['observacao'] . "</th>";
                                echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_superior_financeiro_nao_aprovada.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
                            } else {
                            }
                        }
                    }
                    ?>





      </div>
      <div class='col-1'>

      </div>
  </div>