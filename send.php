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

function updateToDB($userID, $nome, $email, $telefone, $cep, $endereco, $cidade, $estado, $curso){
  $conection = conection();
  $sql = "UPDATE cadastros SET nome='$nome', email='$email', telefone='$telefone', cep='$cep', endereco='$endereco', cidade='$cidade', estado='$estado', curso_id='$curso'
          WHERE id='$userID'";
  if(mysqli_query($conection, $sql)){
    return true;
  }else{
    return false;
  }
}

function deleteFromDB($userID){
  $conection = conection();
  $sql = "DELETE FROM cadastros WHERE id = '$userID'";
  
  if(mysqli_query($conection, $sql)){
    return true;
  }else{
    return false;
  }
}

function setCurso($curso){
  if($curso == "SELECIONE O CURSO DESEJADO"){
    return 0;
  }else{
    $conection = conection();
    $query = mysqli_query($conection, "SELECT id FROM cursos WHERE nome='$curso'");
    $row = mysqli_fetch_array($query);
    $curso = $row['id'];
    return $curso;
  }
}

function getCurso($curso_id){
  $conection = conection();
  $query = mysqli_query($conection, "SELECT nome FROM cursos WHERE id='$curso_id'");
  $row = mysqli_fetch_array($query);
  $curso = $row['nome'];
  return $curso;
}

?>