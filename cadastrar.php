<?php

function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0) {

    include('lib/conexao.php');

    $erro = false;
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    if(empty($nome)) {
        $erro = "Preencha o nome";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail";
    }

    if(!empty($nascimento)) {
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3) {
            $nascimento = implode ('-', array_reverse($pedacos));
        } else {
            $erroData = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }

    if(!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }

    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento)
        VALUES ('$nome', '$email', '$telefone', '$nascimento')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente cadastrado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }

}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style_cadastros.css">
    <title>Cadastrar Cliente</title>
</head>

 <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="clientes.php"> Listar Clientes </a>
        </div>
    </div>
    <div class="container_form">
        <h1>Formulário de Cadastro</h1>
        <form class="form" action="cadastrar.php" method="post">
            <div class="form_grupo">
                <label for="nome" class="form_label">Nome</label>
                <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" type="text" name="nome" class="form_input" id="nome" placeholder="Nome Completo" required>
            </div>

            <div class="form_grupo">
                <label for="email" class="form_label">Email</label>
                <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com" required>
            </div>

            <div class="form_grupo">
                <label for="nascimento" class="form_label">Data de Nascimento</label>
                <input value="<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" type="date" name="nascimento" class="form_input" id="nascimento" placeholder="Data de Nascimento">
            </div>

            <div class="form_grupo">
                <label for="telefone" class="form_label">Telefone</label>
                <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" type="telefone" name="telefone" class="form_input" id="telefone" placeholder="ddd 01234-5678">
            </div>
            <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
           <? echo "$deu_certo" ?>
        </form>
    </div>
 </body>

</html>