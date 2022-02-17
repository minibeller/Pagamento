<?php

include_once 'config.php';
$sql2 = "SELECT *
FROM solicitacao_pagamento.solicitacao as s
INNER JOIN solicitacao_pagamento.favorecido as f
 ON s.favorecido_id_favorecido = f.id_favorecido
INNER JOIN solicitacao_pagamento.aprovacao as a
ON s.id_solicitacao = a.solicitacao_id_solicitacao
WHERE a.aprovacao3 = 'Nao';";

$result2 = $link->query($sql2);
if ($result2->num_rows > 0) {
  while ($row = $result2->fetch_assoc()) {
    $id = $row['id_solicitacao'];
    if ($row['reembolsavel'] == 'Sim-Industrial') {
      $sql3 = "update aprovacao
      SET aprovacao3 = 'Sim-Industrial'
      where solicitacao_id_solicitacao = $id;";      
      $result3 = $link->query($sql3);
    } else {

      $sql3 = "update aprovacao
      SET aprovacao3 = 'Nao_industrial'
      where solicitacao_id_solicitacao = $id;";
      $result3 = $link->query($sql3);
      $sql4 = "update aprovacao
      SET aprovacao4 = 'Nao'
      where solicitacao_id_solicitacao = $id;";  
      $result3 = $link->query($sql4);
    }
  }
}
?>
<!DOCTYPE html>
<html>
<?php
session_start();
if (empty($_SESSION['email'])) {
  header('location:login.php');
}
include_once 'menu.php';
$sql = "SELECT *
FROM solicitacao_pagamento.solicitacao as s
INNER JOIN solicitacao_pagamento.favorecido as f ON s.favorecido_id_favorecido = f.id_favorecido
INNER JOIN solicitacao_pagamento.aprovacao as a
ON s.id_solicitacao = a.solicitacao_id_solicitacao
WHERE a.aprovacao3 = 'Sim-Industrial';";
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
              <a class="page-link" href="area_comercial.php" tabindex="-1">Não Aprovada</a>
            </li>
            <li class="page-item"><a class="page-link" href="area_comercial_aprovadas.php">Aprovada</a></li>
            <li class="page-item"><a class="page-link" href="area_comercial_nao_aprovadas.php">Não Autorizada</a>
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

      <h1>Área do Compras.</h1>
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
            if ($row['aprovacao0'] == 0) {
            } else {
              echo "<tr class='table-primary'>  <th scope='row'>" . $row['numero_protocolo'] . "</th>";
              echo "<th>" . $row['nome_favorecido'] . "</th>";
              echo "<th>" . date('d/m/Y',strtotime($row['data_solicitacao'])) . "</th>";
              echo "<th>" . $row['valor'] . "</th>";
              echo "<th>" .date('d/m/Y',  strtotime($row['vencimento'])). "</th>";
              echo "<th>" . $row['observacao'] . "</th>";
              echo "<th><a type='button' class='btn btn-dark' href='visualizar_area_solicitante_comercial.php?id_solicitacao=" . $row['id_solicitacao'] . "'>Visualizar</a></th></tr>";
            }
          }
        }
        ?>





  </div>
  <div class='col-1'>

  </div>
</div>