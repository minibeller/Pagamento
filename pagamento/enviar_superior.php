<?php

session_start();
if(empty($_SESSION['email'])){
  header('location:login.php');
}
include_once 'menu.php';
include_once 'config.php';
$id_solicitacao = $_GET['id_solicitacao'];
$sql = "UPDATE solicitacao_pagamento.aprovacao 
SET aprovacao2 = 'OK'
WHERE solicitacao_id_solicitacao = $id_solicitacao";

$sql2 = "UPDATE solicitacao_pagamento.aprovacao 
SET aprovacao3 = 'Nao'
WHERE solicitacao_id_solicitacao = $id_solicitacao";

if ($link->query($sql) === TRUE) {
  if ($link->query($sql2) === TRUE) {
    header("Location:visualizar_area_solicitante_aprovadas_financeiro.php?id_solicitacao=".$id_solicitacao);
  }
  else{
      echo "Error updating record: " . $link->error;
    }
}
else{
    echo "Error updating record: " . $link->error;
  }

?>