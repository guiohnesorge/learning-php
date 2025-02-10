<?php
include('conexao.php');
include('protecao.php');

$vCdProduto = '';
$vNmProduto = '';
$vQuantia = '';
$vPreco = '';




//var_dump($_POST);

if (isset($_POST['btnAdd'])) {
    if (empty($_POST['codigo'])) {

        $stmt = $con->prepare("INSERT INTO mercado(nome, quantidade, preco) VALUES (:nome, :quantidade, :preco) ");
        $stmt->execute(array(
            ':nome' => $_POST['nome'],
            ':quantidade' => $_POST['quantidade'],
            ':preco' => $_POST['preco']
        ));
    } else {

        $stmt = $con->prepare("UPDATE mercado SET nome = :nome, quantidade = :quantidade, preco = :preco  WHERE codigo = :codigo");
        $stmt->execute(array(
            ':nome' => $_POST['nome'],
            ':quantidade' => $_POST['quantidade'],
            ':preco' => $_POST['preco'],
            ':codigo' => $_POST['codigo']
        ));
    }
} else
if (isset($_POST['btnEditar'])) {

    $stmt = $con->prepare("SELECT * FROM mercado where codigo=:codigo");
    $stmt->execute(array(
        ':codigo' => $_POST['codigo']
    ));
    $market = $stmt->fetchAll();
    if (!empty($market)) {
        foreach ($market as $value) {
            $vCdProduto = $value['CODIGO'];
            $vNmProduto = $value['NOME'];
            $vQuantia = $value['QUANTIDADE'];
            $vPreco = $value['PRECO'];
        }
    }
} else
if (isset($_POST['btnExcluir'])) {
    $stmt = $con->prepare("DELETE FROM mercado where codigo=:codigo");
    $stmt->execute(array(
        ':codigo' => $_POST['codigo']
    ));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="style4.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #088652;

        }
    </style>
</head>

<body>
    <nav>
        <nav>
            <p><strong>Olá, <span><?php echo $_SESSION['user'];?><span> !</strong></p> 
            <p><strong>Você está editando o estoque.</strong></p>
        </nav>
    </nav>
    <main>

        <form method="POST" action="principal.php">

            <div class="row">
                <div class="col-12 col-md-1">
                    <label for="formGroupExampleInput" class="form-label">Código </label>
                    <input type="text" class="form-control" name="codigo" id="formGroupExampleInput" placeholder="Código" value="<?php echo $vCdProduto ?>" readonly>
                </div>
                <div class="col-12 col-md-5">
                    <label for="formGroupExampleInput" class="form-label">Nome </label>
                    <input type="text" class="form-control" name="nome" id="formGroupExampleInput" placeholder="Nome" value="<?php echo $vNmProduto?>">
                </div>
                <div class="col-12 col-md-2">
                    <label for="formGroupExampleInput" class="form-label">Quantidade </label>
                    <input type="text" class="form-control" name="quantidade" id="formGroupExampleInput" placeholder="Quantidade" value="<?php echo $vQuantia ?>">
                </div>
                <div class="col-12 col-md-2">
                    <label for="formGroupExampleInput" class="form-label">Preço </label>
                    <input type="text" class="form-control" name="preco" id="formGroupExampleInput" placeholder="Preço" value="<?php echo $vPreco ?>">
                </div>
                <div class="col-12 col-md-2 mt-4">

                    <button type="submit" name="btnAdd" class="btn btn-success">Adicionar</button>
                    <button type="submit" name="btnReset" class="btn btn-light">Reset</button>
                </div>
            </div>
        </form>



        <?php
            $stmt = $con->prepare("SELECT * FROM mercado");
            $stmt->execute();
            $mercado = $stmt->fetchAll();
            ?>
        <div class="col-12 col-md-12">


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($mercado as $value) {
                    ?>

                        <tr>
                            <td><?php echo $value['CODIGO'] ?></td>
                            <td><?php echo $value['NOME'] ?></td>
                            <td><?php echo $value['QUANTIDADE'] ?></td>
                            <td><?php echo $value['PRECO'] ?></td>

                            <td>
                                <form method="POST" name="nomeForm<?php echo $value['CODIGO'] ?>" action="principal.php">
                                    <input type="hidden" name="codigo" value="<?php echo $value['CODIGO'] ?>">
                                    <button type="submit" class="btn btn-info" name="btnEditar">Editar</button>
                                </form>

                            </td>
                            <td>
                                <form method="POST" name="nomeForm<?php echo $value['CODIGO'] ?>" action="principal.php">
                                    <input type="hidden" name="codigo" value="<?php echo $value['CODIGO'] ?>">
                                    <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                                </form>

                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>





    </main>

</body>

</html>