<?php

function conection(){
  include('config.php');
  $conection = new mysqli($host, $username, $password, $db_name);
  mysqli_set_charset($conection, "utf8");
  if (!$conection) {
    die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
  }else{
    return $conection;
  }
}

function checkEmail($email){
  $conection = conection();
  $query = mysqli_query($conection, "SELECT * FROM cadastros WHERE email='$email'");
  if(mysqli_num_rows($query) >= 1){
    return true;
  }else{
    return false;
  }
}

function sendToDB($nome, $email, $telefone, $cep, $endereco, $cidade, $estado, $curso, $data_criacao){
  $conection = conection();
  $sql = "INSERT INTO cadastros (nome, email, telefone, cep, endereco, cidade, estado, curso_id, data_criacao) 
          VALUES('$nome','$email','$telefone','$cep','$endereco','$cidade','$estado','$curso','$data_criacao')";
  
  if(mysqli_query($conection, $sql)){
    return true;
  }else{
    return false;
  }
}

function setCurso($curso){
  switch ($curso){
    case "ADMINISTRAÇÃO":
      return 1;
      break;
    case "ANÁLISE E DESENVOLVIMENTO DE SISTEMAS":
      return 2;
      break;
    case "ARQUITETURA & URBANISMO":
      return 3;
      break;
    case "CIÊNCIAS CONTÁBEIS":
      return 4;
      break;
    case "COMUNICAÇÃO SOCIAL":
      return 5;
      break;
    case "DIREITO":
      return 6;
      break;
    case "EDUCAÇÃO FÍSICA":
      return 7;
      break;
    case "ENFERMAGEM":
      return 8;
      break;
    case "ENGENHARIA AMBIENTAL E SANITÁRIA":
      return 9;
      break;
    case "ENGENHARIA DE PRODUÇÃO":
      return 10;
      break;
    case "ENGENHARIA MECÂNICA":
      return 11;
      break;
    case "FISIOTERAPIA":
      return 12;
      break;
    case "HISTÓRIA":
      return 13;
      break;
    case "PEDAGOGIA":
      return 14;
      break;
    case "PSICOLOGIA":
      return 15;
      break;
    default:
      return 0;
  }
}

?>