<?php

include ("lib/conexao.php");
class Usuario
{

    private $nome;
    private $sobrenome;

    public function __construct(string $nome)
    {

        $nome = explode(" ", $_POST["nome"], 2);

        $this -> nome = $nome[0];
        $this -> sobrenome = $nome[1];

    }

    public function getNome(): string
    {
        return $this -> nome;
    }

    public function getSobrenome(): string
    {
        return $this -> sobrenome;
    }

}

    $sql_clientes = "SELECT * FROM clientes";
    $query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
    $num_clientes = $query_clientes->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-BR">>
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
    <title>Lista de Clientes</title>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">HOME</a>
            <a class="navbar-brand" href="cadastrar.php" > Cadastrar mais clientes </a>
        </div>
    </div>
    <div class="container_form">
        <h1>Lista de Clientes</h1>
            <p>Estes são os clientes cadastrados no seu sistema:</p>
            <div class="container mt-3"></div>
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php if($num_clientes == 0) { ?>
                    <tr>
                        <td colspan="7">Nenhum cliente foi cadastrado</td>
                    </tr>
                    <?php
                    } else {
                        while ($cliente = $query_clientes->fetch_assoc()) {
                        $telefone = "Não informado";
                        if(!empty($cliente['telefone'])) {
                            $telefone = formatar_telefone($cliente['telefone']);
                        }
                        $nascimento = "Não informada";
                        if(!empty($cliente['nascimento'])) {
                            $nascimento = formatar_data($cliente['nascimento']);
                        }

                    ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $telefone; ?></td>
                        <td><?php echo $nascimento; ?></td>
                        <td>
                        <button class="btn btn-outline-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg><a href="deletar.php?id=<?php echo $cliente['id']; ?>"> Excluir </a></button>

                        <button class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg><a href="editar.php?id=<?php echo $cliente['id']; ?>"> Editar</a></button>

                        </td>
                    </tr>
                    <?php }      } ?>
                </tbody>
            </table>
            </div>
    </div>

</body>
</html>