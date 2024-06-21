<?php

include('lib/conexao.php');

$id = intval($_GET['id']);
function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}

if(count($_POST) > 0) {

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
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
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
        $sql_code = "UPDATE clientes
        SET nome = '$nome',
        email = '$email',
        telefone = '$telefone',
        nascimento = '$nascimento'
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }

}

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

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
    <title>Editar Cliente</title>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="clientes.php"> Listar Clientes </a>
        </div>
    </div>
    <div class="container_form">
    <form class="table table-striped" method="POST" action="">
        <p>
            <label class="form_label">Nome</label>
            <input class="form_input"value="<?php echo $cliente['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label class="form_label">E-mail</label>
            <input class="form_input" value="<?php echo $cliente['email']; ?>" name="email" type="text">
        </p>
        <p>
            <label class="form_label">Telefone</label>
            <input class="form_input" value="<?php if(!empty($cliente['telefone'])) echo formatar_telefone($cliente['telefone']); ?>"  placeholder="(11) 98888-8888" name="telefone" type="text">
        </p>
        <p>
            <label class="form_label">Data de Nascimento</label>
            <input class="form_input"value="<?php if(!empty($cliente['nascimento'])) echo formatar_data($cliente['nascimento']); ?>"  name="nascimento" type="text">
        </p>
        <p>
            <button type="submit" class="btn btn-success">Salvar Cliente</button>
        </p>
    </form>
    </div>
</body>
</html>