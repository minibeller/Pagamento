<?php
include_once 'menu.php';
include_once 'config.php';
$id_solicitacao = $_GET['id_solicitacao'];  
?>
<body class="text-center">
    <div class="row" style='width:100%'>
        <div class="col-4"></div>
        <div class="col-4" style="margin-bottom: 150px; margin-top: 100px;">        
        <img src="img/logo.png" class='logo'>     
        <div class="col-sm text-center">
        
                <h3>Digite sua senha para aprovar a Solicitação</h3>
                <form method="POST" action="aprovar_imediato.php" class="form-signin">
                    <input type="hidden" name="id_solicitante" value="<?php echo $id_solicitacao; ?>">
                    <label for="inputPassword" class="mt-3 sr-only">Senha:</label>
                    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
                    <button style="width:100%" class="btn mt-3 text-white btn-success btn-lg btn-block" type="submit">Assinar</button>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</body>