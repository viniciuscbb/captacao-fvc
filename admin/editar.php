<?php
include('./checkLogin.php');
include('../send.php');
function userID(){
  return htmlspecialchars($_GET["id"]);
}

function getNome(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT nome FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$nome = $row['nome'];
  }
  return $nome;
}

function getEmail(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT email FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$email = $row['email'];
  }
  return $email;
}

function getTelefone(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT telefone FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$telefone = $row['telefone'];
  }
  return $telefone;
}

function getCEP(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT cep FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$cep = $row['cep'];
  }
  return $cep;
}

function getEndereco(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT endereco FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$endereco = $row['endereco'];
  }
  return $endereco;
}

function getCidade(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT cidade FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$cidade = $row['cidade'];
  }
  return $cidade;
}

function getEstado(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT estado FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$estado = $row['estado'];
  }
  return $estado;
}

function getCurso2(){
  $userID = userID();
  $conection = conection();
  $query = mysqli_query($conection, "SELECT curso_id FROM cadastros where id='$userID'");
  while($row = mysqli_fetch_array($query)){
		$curso_id = $row['curso_id'];
	}
  return getCurso($curso_id);
}

$mensagem = "";
if (isset($_POST['enviar'])){
  $nome=$_POST['inputNome'];
  $email=$_POST['inputEmail4'];
  $telefone=$_POST['inputTel'];
  $cep=$_POST['inputZip'];
  $endereco=$_POST['inputAddress'];
  $cidade=$_POST['inputCity'];
  $estado=$_POST['inputState'];
  $curso=setCurso($_POST['selectCursoDesejado']);
  
  $userID = userID();
  if(updateToDB($userID, $nome, $email, $telefone, $cep, $endereco, $cidade, $estado, $curso)){
    $mensagem = "<div class='alert alert-success' role='alert'>
                  <h4 class='alert-heading'>Muito bem!</h4>
                  <p>Os dados foram atualizados com sucesso.</p>
                </div>";
  }else{
    $mensagem = "<div class='alert alert-danger' role='alert'>
                  <h4 class='alert-heading'>Ops!</h4>
                  <p>Erro ao tentar atualizar os dados.</p>
                </div>";
  }
}

if (isset($_POST['apagar'])){
  $userID = userID();
  if(deleteFromDB($userID)){
    $mensagem = "<script>
                  alert('Os dados foram deletados com sucesso');
                  window.location = ('index.php');
                </script>";
  }else{
    $mensagem = "<div class='alert alert-danger' role='alert'>
                  <h4 class='alert-heading'>Ops!</h4>
                  <p>Erro ao tentar apagar os dados.</p>
                </div>";
  }
}

if (isset($_POST['voltar'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Captação FVC</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
  <div class="logo">
    <img src="../images/fvclogo.png" alt="Logo FVC">
    <a>Editar dados</a>
  </div>
  
<section class="content shadow-lg p-3 mb-5 ">
    <?php 
      echo $mensagem; 
    ?>
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">NOME</label>
            <input type="text" class="form-control" name="inputNome" value="<?php echo getNome(); ?>" placeholder="Nome completo" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">E-MAIL</label>
            <input type="email" name="inputEmail4" class="form-control" value="<?php echo getEmail(); ?>" placeholder="Email" required>
              <div class="invalid-feedback">
                <a id="erroEmail"></a>
              </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">TELEFONE</label>
            <input type="text" class="form-control" name="inputTel" value="<?php echo getTelefone(); ?>" placeholder="__ _____-____" required>
              <div class="invalid-feedback">
                <a id="erroTel"></a>
              </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputZip">ENDEREÇO CEP</label>
            <input type="text" class="form-control" name="inputZip" value="<?php echo getCEP(); ?>" placeholder="____-___" required>
            <div class="invalid-feedback">
                <a id="erroZip"></a>
              </div>
          </div>
        </div>
            <div class="form-group">
              <label for="inputAddress">RUA E BAIRRO</label>
              <input type="text" class="form-control" name="inputAddress" value="<?php echo getEndereco(); ?>" placeholder="Rua, Bairro" required>
            </div>      
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">CIDADE</label>
            <input type="text" class="form-control" name="inputCity" value="<?php echo getCidade(); ?>" placeholder="Cidade onde mora" required>
          </div>

          <div class="form-group col-md-6">
            <label for="inputState">ESTADO</label>
            <input type="text" class="form-control" name="inputState" value="<?php echo getEstado(); ?>" placeholder="Estado onde mora" required>
          </div>
        
        <div class="form-group col-md">
        <label for="inputState">CURSO DESEJADO</label>
          <select class="form-control" name="selectCursoDesejado">
            <option><?php echo getCurso2(); ?></option>
            <option>NENHUM</option>
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
        <button type="submit" name="enviar" class="btn btn-primary btn-lg">SALVAR</button>
        <button type="submit" name="apagar" class="btn btn-danger btn-lg">APAGAR</button>
        <button type="submit" name="voltar"class="btn btn-primary btn-lg">VOLTAR</button>
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
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../javascript/scripts.js"></script>
</body>
</html>