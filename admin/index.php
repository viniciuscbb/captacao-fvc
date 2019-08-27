<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Administração - Captação FVC</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../script/jquery.js"></script>
  <style type="text/css">
	body {
		color: #4e4e4e;
		background: #e2e2e2;
		font-family: 'Roboto', sans-serif;
	}
    .form-control {
		background: #f2f2f2;
        font-size: 16px;
		border-color: transparent;
		box-shadow: none !important;
	}
	.form-control:focus {
		border-color: #91d5a8;
        background: #e9f5ee;
	}
    .form-control, .btn {        
        border-radius: 2px;
    }
	.login-form {
		width: 380px;
		margin: 0 auto;
	}
    .login-form h2 {
        margin: 0;
        padding: 30px 0;
        font-size: 34px;
    }
	.login-form .avatar {
    margin: 0 auto 20px;
    background: url("../images/fvclogo.png") no-repeat 50%;
		width: 280px;
		height: 100px;
		padding: 15px;
    border-radius: 10px;
    background-color: #4aba70;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
	}
	.login-form .avatar img {
		width: 100%;
	}
    .login-form form {
		color: #7a7a7a;
		border-radius: 10px;
    	margin-bottom: 20px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;		
    }
    .login-form .btn {
      margin-left: 30%;
		font-size: 16px;
		line-height: 26px;
		min-width: 120px;
        font-weight: bold;
		background: #4aba70;
		border: none;		
    border-radius: 10px;
    }
	.login-form .btn:hover, .login-form .btn:focus{
		background: #40aa65;
        outline: none !important;
	}
	.checkbox-inline {
		margin-top: 14px;
	}
	.checkbox-inline input {
		margin-top: 3px;
	}
    .login-form a {
		color: #4aba70;
    
	}	
	.login-form a:hover {
		text-decoration: underline;
	}
	.hint-text {
		color: #999;
        text-align: center;
		padding-bottom: 15px;
	}
</style>
</head>
<body>
<div class="login-form">
	<h2 class="text-center">Login do Adiministrador</h2>
    <form action="/examples/actions/confirmation.php" method="post">
		<div class="avatar">
		</div>           
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="username" placeholder="Usuário" required="required">	
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Senha" required="required">
        </div>        
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-right">Login</button>
        </div>		
    </form>
</div>
</body>
