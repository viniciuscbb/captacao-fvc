<?php
@session_start();
if(!isset($_SESSION['admin']) == true){
  unset($_SESSION['admin']);
  header("location: login.php");
}
?>