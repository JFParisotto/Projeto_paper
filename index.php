<?php

include ("lib/conexao.php");

?>

<!DOCTYPE html>
	<head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
  	<link rel="stylesheet" href="css/bootstrap.css">
    <title>PAPER UNIASSELVI</title>
	</head>

<body>s

    <!-- Início da barra de navegação -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">

            <!-- botao utilizado para abrir menu em dispositivos resolucao menor -->
          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          	</button>

            <!-- logo do site -->
            <a class="navbar-brand" href="#">FICTICÍO</a>
						<!-- inicio menu -->
            <div class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">INICIO</a></li>
                <li><a href="#">A EMPRESA</a></li>
                <li><a href="#">PRODUTOS</a></li>
                <li><a href="cadastrar.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg></a>
                </li>
              </ul>
            </div>
            <!-- fim menu -->

		</div>
	</div>
	<!-- Fim da barra de navegação -->

   <!-- Cria area principal de marketing de um site -->
    <div class="jumbotron">
      <div class="container">
      	<br />
        <h1>Desenvolvimento de sistemas</h1>
        <p>
        	A Ficticía é uma empresa focada em desenvolvimento de sistemas.
        	Com grande experiência em soluções de Tecnologia da Informação a Fictícia é uma empresa especializada
        	no desenvolvimento e comercialização de software.
        </p>
      <p><a class="btn btn-primary btn-lg" role="button">Veja mais &raquo;</a></p>
      </div>
    </div>

    <div class="container"><!-- início do container -->
      <!-- Criação de colunas -->
      <div class="row">

        <div class="col-md-4">
          <h2>A EMPRESA</h2>
          <p>
          	Com grande experiência em soluções de Tecnologia da Informação a Ficticía é uma empresa especializada no
          	desenvolvimento e comercialização de software.
          </p>
          <p><a class="btn btn-default" href="#">Veja mais &raquo;</a></p>
        </div>

        <div class="col-md-4"></div>

        <div class="col-md-4">
          <h2>SERVIÇOS</h2>
          <p>
          	- Sites institucionais
            <br />- Manutenção
            <br />- Sistemas Online
            <br />- Sites para celulares
            <br />- App Mobile / Mac
            <br />- Lojas virtuais
            <br />- Criações personalizadas
          </p>
          <p><a class="btn btn-default" href="#">Veja mais detalhes &raquo;</a></p>
        </div>

      </div>

      <hr>

      <footer>
        <p>&copy; FICTICÍO 2024</p>
      </footer>
    </div> <!-- final do container -->

	</body>

</html>