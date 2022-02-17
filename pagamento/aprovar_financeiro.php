<?php
session_start();
if(empty($_SESSION['email'])){
  header('location:login.php');
}
include_once 'menu.php';
include_once 'config.php';

$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$senha_digitada = $_POST['senha'];
$id_solicitacao = $_POST['id_solicitante'];  

$sql = "SELECT user_id_user, favorecido_id_favorecido,id_solicitacao FROM solicitacao WHERE id_solicitacao = $id_solicitacao";

$result = $link->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $user_id_user = $row["user_id_user"];
    $favorecido_id_favorecido = $row["favorecido_id_favorecido"];
    $id_solicitacao_sql = $row["id_solicitacao"];

    $sql2 = "UPDATE aprovacao SET aprovacao2 = 'Sim'
    WHERE solicitacao_id_solicitacao = $id_solicitacao";
   
   

    if ($link->query($sql2) === TRUE) {
     
        header('location:area_financeiro.php');
     
     
    } else {
      echo "Error: " . $sql2 . "<br>" . $link->error;
    }

    $link->close();

  }
} else {
  echo "0 results";
}






?>
