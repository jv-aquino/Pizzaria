<?php
  if($_POST) {
  include 'conexao.php';
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $senha = mysqli_real_escape_string($con,$_POST['senha']);

    $sql = "SELECT id_cliente FROM cliente WHERE email = '".$email."' AND senha = '".$senha."'";

    $resultado = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
    $count = mysqli_num_rows($resultado);

    if($count == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['email_login'] = $email;
      $_SESSIO['logado'] = 'logado';
      
      header("location:../index.php");
    }
    else {
      
    }
  }
  }
?>