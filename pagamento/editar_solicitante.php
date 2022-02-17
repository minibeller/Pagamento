<script>
    function pagamento() {
        var x = document.createElement("div");
        x.setAttribute("type", "hidden");
        document.body.appendChild(x);

        document.getElementById("demo").innerHTML = "<div class='row'><div class='col-4'>  <div style='margin-top: 10px;'><label class='form-check-label' for='exampleCheck1'>Banco</label><input name='banco' class='form-control' type='text' placeholder='Banco' aria-label='default input example'></div></div><div class='col-4'><div style='margin-top: 10px;'><label class='form-check-label' for='exampleCheck1'>Agência</label>      <input name='agencia' class='form-control' type='text' placeholder='Agência' aria-label='default input example'></div></div><div class='col-4'><div style='margin-top: 10px;'><label class='form-check-label' for='exampleCheck1'>Conta</label><input name='conta' class='form-control' type='text' placeholder='Conta' aria-label='default input example'></div></div></div>";


    }

    function tirapagamento() {
        var x = document.createElement("div");
        x.setAttribute("type", "hidden");
        document.body.appendChild(x);

        document.getElementById("demo").innerHTML = "";


    }
</script>
<!DOCTYPE html>
<html>
<?php
session_start();
if (empty($_SESSION['email'])) {
    header('location:login.php');
}
include_once 'menu.php';
include_once 'config.php';
$id_solicitacao  = $_GET['id_solicitacao'];
$sql_solicitacao = "SELECT * FROM solicitacao WHERE id_solicitacao = $id_solicitacao";
$result2 = $link->query($sql_solicitacao);
if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {
        $numero_protocolo = $row['numero_protocolo'];
        $data_solicitacao = $row['data_solicitacao'];
        $forma_pagamento = $row['forma_pagamento'];
        $vencimento = $row['vencimento'];
        $data_envio = $row['data_envio'];
        $valor = $row['valor'];
        $sell_out = $row['sell_out'];
        $percentual = $row['percentual'];
        $banco = $row['banco'];
        $agencia = $row['agencia'];
        $conta = $row['conta'];
        $observacao = $row['observacao'];
    }
}
$sql_arquivo = "SELECT arquivo FROM arquivos WHERE solicitacao_id_solicitacao = $id_solicitacao;";
$result3 = $link->query($sql_arquivo);
$sql = "SELECT * FROM solicitacao_pagamento.favorecido;";
$result = $link->query($sql);







?>
<div class='row' style="width: 100%">

    <div class='col-2'>

    </div>
    <div class='col-8'>
        <form action="verifica_solicitacao.php" enctype="multipart/form-data" method="POST">
            <div class="badge bg-dark text-wrap" style="width: 100%;margin-top: 1cm;">
                <h1>Editar Solicitação.</h1>
            </div>

            <div class='row'>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Número Protocolo</label>
                        <input name='numero_protocolo' class="form-control" type="text" value="<?php echo $numero_protocolo ?>" placeholder="<?php echo $numero_protocolo ?>" aria-label="default input example">
                    </div>
                </div>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Favorecido</label>
                    </div>
                    <div class="btn-group dropup " style=" width:100%;">

                        <select id="nome_favorecido" name="nome_favorecido" type="button" class="btn btn-dark ">

                            <?php
                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=" . $row['id_favorecido'] . ">" . $row['id_favorecido'] . " - " . $row['nome_favorecido'] . "</option>";
                                    echo "<option value=" . $row['id_favorecido'] . ">" . $row['id_favorecido'] . " - " . $row['nome_favorecido'] . "</option>";
                                }
                            }



                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-4'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Data Solicitação</label>
                        <input name='data_solicitacao' class="form-control" type="date" value="<?php echo date('d/m/Y',strtotime($data_solicitacao)); ?>" placeholder="<?php echo date('d/m/Y',strtotime($data_solicitacao)); ?>" aria-label="default input example">
                    </div>
                </div>
                <div class='col-4'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Forma de Pagamento</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Boleto" name='forma_pagamento' id="demo" onclick="tirapagamento()">
                        <label class="form-check-label" for="inlineCheckbox1">Boleto</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Depósito em Conta" name='forma_pagamento' id="demo" onclick="pagamento()">
                        <label class="form-check-label" for="inlineCheckbox2">Depósito em Conta</label>
                    </div>
                </div>
                <div class='col-4'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Vencimento</label>
                        <input name='vencimento' class="form-control" type="date" value="<?php echo date('d/m/Y',  strtotime($vencimento)) ?>" placeholder="<?php echo $vencimento ?>" aria-label="default input example">
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Data Envio</label>
                        <input name='data_envio' class="form-control" type="date" value="<?php echo date('d/m/Y',strtotime($data_envio)) ?>" placeholder="<?php echo  date('d/m/Y',strtotime($data_envio))?>" aria-label="default input example">
                    </div>
                </div>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Valor</label>
                        <input name='valor' class="form-control" type="text" value="<?php echo $valor ?>" placeholder="<?php echo $valor ?>" aria-label="default input example">
                    </div>
                </div>
            </div>

            <div id="demo">
                <div class='row'>
                    <div class='col-4'>
                        <div style='margin-top: 10px;'>
                            <label class='form-check-label' for='exampleCheck1'>Banco</label>
                            <input name='banco' class='form-control' type='text' value="<?php echo $banco ?>" placeholder="<?php echo $banco ?>" aria-label='default input example'>
                        </div>
                    </div>
                    <div class='col-4'>
                        <div style='margin-top: 10px;'>
                            <label class='form-check-label' for='exampleCheck1'>Agência</label>
                            <input name='agencia' class='form-control' type='text' value="<?php echo $agencia ?>" placeholder="<?php echo $agencia ?>" aria-label='default input example'>
                        </div>
                    </div>
                    <div class='col-4'>
                        <div style='margin-top: 10px;'>
                            <label class='form-check-label' for='exampleCheck1'>Conta</label>
                            <input name='conta' class='form-control' type='text' value="<?php echo $conta ?>" placeholder="<?php echo $conta ?>" aria-label='default input example'>
                        </div>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Sell Out</label>
                        <input name='sell_out' class="form-control" type="text" value="<?php echo $sell_out ?>" placeholder="<?php echo $sell_out ?>" aria-label="default input example">
                    </div>
                </div>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <label class="form-check-label" for="exampleCheck1">Percentual</label>
                        <input name='percentual' class="form-control" type="text" value="<?php echo $percentual ?>" placeholder="<?php echo $percentual ?>" aria-label="default input example">
                    </div>
                </div>
            </div>
            <div class='row'>

                <div id='demo'></div>

            </div>
            <div class='row'>
                <div class='col-12'>
                    <div style="margin-top: 10px;">
                        <label for="exampleFormControlTextarea1">Observação</label>
                        <textarea class="form-control" type="text" name='observacao' value="<?php echo $observacao ?>" placeholder="<?php echo $observacao ?>" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class='row' >
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <?php
                        if ($result3->num_rows > 0) {

                            while ($row = $result3->fetch_assoc()) {



                                echo "<a style='width: 100%' type='button' class='btn btn-secondary' href='http://localhost/pagamento/update/" . $row['arquivo'] . "'>Visualizar PDF</a>";
                            }
                        }

                        ?>

                    </div>
                </div>
                <div class='col-6'>
                    <div style="margin-top: 10px;">
                        <button style='width: 100%' type="submit" class="btn btn-success">Atualizar</button>
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