<!DOCTYPE html>
<?php
	$Message = "";
	if (isset($_POST['Login'])){
		@session_start();
		$myusername=$_POST['username'];
		$mypassword=$_POST['password'];

		if($myusername=='admin' and $mypassword== 'admin'){
			$_SESSION['username']=true;
			header("location: index.php");
		} else {	
			$Message ="<div class='alert alert-danger alert-dismissible'>
           <h4><i class='icon fa fa-check'></i>Erro no login!</h4> Usuário ou senha inválidos.</div>";
		}	
	}

?>


<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Administração - Captação FVC</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/login.css">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../script/jquery.js"></script>
</head>
<body>

<div class="login-form">
	<h2 class="text-center">Login do Administrador</h2>
		<?php
	  echo "$Message";
    ?>
    <form action="" method="post">
		<div class="avatar">
		</div>           
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="username" placeholder="Usuário" required="required">	
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Senha" required="required">
        </div>        
        <div class="form-group clearfix">
            <button type="submit" name="Login" class="btn btn-primary btn-lg pull-right">Login</button>
				</div>		
				
		</form>
</div>
</body>
