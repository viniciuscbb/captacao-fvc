<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Captação FVC</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
  <div class="logo">
    <img src="./images/fvclogo.png" alt="Logo FVC">
    <a>Captação Faculdade Vale do Cricaré</a>
  </div>
<section class="content shadow-lg p-3 mb-5 ">
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">NOME</label>
            <input type="text" class="form-control" name="inputNome" placeholder="Nome completo">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">E-MAIL</label>
            <input type="email" name="inputEmail4" class="form-control" placeholder="Email">
              <div class="invalid-feedback">
                <a id="erroEmail"></a>
              </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">TELEFONE</label>
            <input type="text" class="form-control" name="inputTel" placeholder="DDD com dois dígitos">
              <div class="invalid-feedback">
                <a id="erroTel"></a>
              </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputZip">ENDEREÇO CEP</label>
            <input type="text" class="form-control" name="inputZip" placeholder="Somente numeros">
            <div class="invalid-feedback">
                <a id="erroZip"></a>
              </div>
          </div>
        </div>
            <div class="form-group">
              <label for="inputAddress">RUA E BAIRRO</label>
              <input type="text" class="form-control" name="inputAddress" placeholder="Rua, Bairro">
            </div>      
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">CIDADE</label>
            <input type="text" class="form-control" name="inputCity" placeholder="Cidade onde mora">
          </div>

          <div class="form-group col-md-6">
            <label for="inputState">ESTADO</label>
            <input type="text" class="form-control" name="inputState" placeholder="Estado onde mora">
          </div>
        
        <div class="form-group col-md">
        <label for="inputState">CURSO DESEJADO</label>
          <select class="form-control" name="selectCursoDesejado">
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
        </div>
        <div class="form-group">    
        <button type="submit" name="enviar" class="btn btn-primary btn-lg">ENVIAR</button>
      </div>
    </form>
</div>
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
              <button id="botaoadm" type="button" class="btn btn-outline-light">Painel administrativo</button>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--Bottom Footer-->
</footer>
<!-- Footer -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="./javascript/scripts.js"></script>
  
<?php

function conection(){
  include('config.php');
  $conection = new mysqli($host, $username, $password, $db_name);
  if (!$conection) {
    die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
  }else{
    return $conection;
  }
}

if (isset($_POST['enviar'])){
  if(!checkEmail()){ //Verifica se o email não existe
    echo "email não existe";
  }
}

function checkEmail(){
  $conection = conection();
  $email=$_POST['inputEmail4'];
  $query = mysqli_query($conection, "SELECT * FROM cadastros WHERE email='$email'");
  if(mysqli_num_rows($query) >= 1){
    echo "<script>mudaInput(true);</script>";
    return true;
  }else{
    return false;
  }
}
?>
</body>
</html>