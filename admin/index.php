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
    <a>Painel Administrativo</a>
  </div>
  
<section class="content shadow-lg p-3 mb-5 ">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">CIDADE/ESTADO</th>
      <th scope="col">CURSO</th>
      <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
  <?php
$conection = conection();
$query = mysqli_query($conection, "SELECT * FROM cadastros order by nome");
while($row = mysqli_fetch_array($query)){
	
	$id = $row['id'];
	$nome = $row['nome'];
	$telefone = $row['telefone'];
	$email = $row['email'];
	$cidade = $row['cidade'];
	$estado = $row['estado'];
	$curso = getCurso($row['curso_id']);
  echo '<tr>
          <th scope="row">'.$id.'</th>
            <td>'.$nome.'</td>
            <td>'.$telefone.'</td>
            <td>'.$email.'</td>
            <td>'.$cidade.' - '.$estado.'</td>
            <td>'.$curso.'</td>
            <td><a href="editar.php?id='.$id.'" title="Clique aqui para editar">
                <span class="badge badge-info">EDITAR</span></a></td>
        </tr>';
}
?> 
  </tbody>
</table>
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
						</div>
					</div>
				</div>
			</div>
		</div>
<!--Bottom Footer-->
</footer>
<!-- Footer -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>       