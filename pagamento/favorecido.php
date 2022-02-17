
<!DOCTYPE html>
<html>
<?php
session_start();
if(empty($_SESSION['email'])){
  header('location:login.php');
}
include_once 'menu.php';
include_once 'config.php';
?>
<div class='row' style="width:100%; ">

    <div class='col-2'>
    
    </div>
    <div class='col-8'>
        <form action="verifica_favorecido.php" method="POST">
            <div class="badge bg-dark text-wrap" style="width: 100%;margin-top: 1cm;">
            <h1>Cadastrar Favorecido.</h1>
            </div>
            <div style="margin-top: 10px;">
                <label class="form-check-label" for="exampleCheck1">Nome favorecido</label>
                <input name='nome_favorecido' class="form-control" type="text" placeholder="Nome favorecido" aria-label="default input example">
            </div>
            <div style="margin-top: 10px;">
                <label class="form-check-label" for="exampleCheck1">CPF ou CNPJ</label>
                <input name='cnpj' class="form-control" type="text" placeholder="CPF ou CNPJ    " aria-label="default input example">
            </div>
            <div style="margin-top: 10px;">
                <div class='row'>
                    <div class='col-6'>
                        <button style="width:100%;" type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class='col-6'>
                    
                    </div>
                   
                </div>               
               
            </div>
        </form>
    </div>
    <div class='col-2'>
    
    </div>
</div>
</body>
</html>