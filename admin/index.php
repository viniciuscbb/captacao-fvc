<!DOCTYPE html>
<?php
include('./checkLogin.php');
include('../send.php');

?>

<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Painel administrativo - Captação FVC</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="shortcut icon" href="../images/favicon.ico" />
  
</head>
<body>
  <div class="logo">
    <img src="../images/fvclogo.png" alt="Logo FVC">
    <a style="margin-left: 169px">Painel Administrativo</a>
    <img src="../images/logocerta_transparente.png" style="margin-left: 125px" width="250" height="70" alt="Logo TeckDevel">
  </div>
  
<section class="content shadow-lg p-2 mb-5 ">
  <form method="post">
    <div class="form-row ">
      <a class="navbar-brand mx-sm-2">Pesquisar</a>
      <div class="col-md-4 mb-2">
        <input class="form-control" type="search" placeholder="Nome" aria-label="Nome" name="nomePesquisa">
      </div>
      <div class="col-md-5 mb-2">
        <select class="form-control" name="cursoSelecionado">
              <option>SELECIONE O CURSO DESEJADO</option>
              <option>ADMINISTRAÇÃO</option>
              <option>ANÁLISE E DESENVOLVIMENTO DE SISTEMAS</option>
              <option>ARQUITETURA & URBANISMO</option>
              <option>CIÊNCIAS CONTÁBEIS</option>
              <option>COMUNICAÇÃO SOCIAL</option>
              <option>DIREITO</option>
              <option>EDUCAÇÃO FÍSICA</option>
              <option>ENFERMAGEM</option>
              <option>ENGENHARIA AMBIENTAL E SANITÁRIA</option>
              <option>ENGENHARIA DE PRODUÇÃO</option>
              <option>ENGENHARIA MECÂNICA</option>
              <option>FISIOTERAPIA</option>
              <option>HISTÓRIA</option>
              <option>PEDAGOGIA</option>
              <option>PSICOLOGIA</option>
          </select>
      </div>
        <button type="submit" name="pesquisar" class="btn btn-outline-success mb-2">Pesquisar</button>
    </div>
  </form>
<table class="table table-hover" id="tabela">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">CIDADE/ESTADO</th>
      <th scope="col">CURSO</th>
      <th scope="col" id="acoes">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($_POST['pesquisar'])){
        $nome=$_POST['nomePesquisa'];
        $curso=setCurso($_POST['cursoSelecionado']);
        echo mostraLista(1, $nome, $curso);  //1 para pesquisa
      }else{
        echo mostraLista(2, null, null);  //2 para consulta normal
      }
  ?> 
  </tbody>
</table>
  <button type="button" style="margin-left: 45%" id="imprimir" class="btn btn-outline-success mb-2">Imprimir lista</button>
</section>
<!-- Footer -->
<footer>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="bottom section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
            <ul class="social-network social-circle">
              <li><a href="https://fb.com/fvcoficial" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/fvcoficial" target="_blank" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/fvc.oficial/" target="_blank" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
             <li><a href="https://www.ivc.br/" target="_blank" class="icoWeb" title="Site FVC"><i class="fa fa-globe"></i></a></li>
           </ul>
						<div class="copyright">
              <p>&copy <span>2019</span> <a href="https://ivc.br" target="_blank" class="transition">FVC – Faculdade Vale do Cricaré</a> Todos os direitos reservados.</p>
              <button id="botaovoltar" type="button" class="btn btn-outline-light">Página de Cadastro</button>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--Bottom Footer-->
</footer>
<!-- Footer -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../javascript/imprimir.js"></script>
  <script>
  let botao2 = document.getElementById("botaovoltar").onclick = function(){
    window.location.href=('../index.php');
  }
</script>

</body>
</html>       