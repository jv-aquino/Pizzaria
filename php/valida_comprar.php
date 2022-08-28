<?php
    session_start();
    include 'conexao.php';
    date_default_timezone_set("America/New_York");
    
    $email = $_SESSION['email'];
    $id_cliente = '(SELECT id_cliente FROM cliente WHERE email = "'.$email.'")';
    $endereço_pedido = $_POST["endereco"];
    $data = date("Y-m-d");
    $tempo =  date("h:i:s");
    $sql = 'INSERT INTO pedido VALUES (NULL,'.$id_cliente.', "'.$endereço_pedido.'", "'.$data.'", "'.$tempo.'");';
    $res = mysqli_query($con,$sql) or die("Erro na inserção 1");

    $nmr_itens = $_POST['nmrItems'];
    $id_pedido = '(SELECT id_pedido FROM pedido WHERE data_pedido = "'.$data.'" AND tempo_pedido = "'.$tempo.'")';

    for ($i = 1; $i <= $nmr_itens; $i++) {
        $id_item = $_POST[$i];
        $sql = "INSERT INTO pedidoitem VALUES (".$id_pedido.", ".$id_item.")";
        $res = mysqli_query($con,$sql) or die("Erro na inserção 2");
    }

    mysqli_close($con);
    header('Refresh: 4; URL=../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../dist/favicon.ico">
  <link rel="stylesheet" href="../dist/style.css">
  <title>Pizzaria do 085</title>
</head>
<body>
  <div class="logout-container">
    <form>
      <h2 class="font-bold text-3xl">Você quer mesmo sair?</h2>

      <button type="button" class='logar'><a href="./php/logout.php">Sim</a></button>
      <button type="button" class="cancel" id="cancel-logout">Não</button>
    </form>
  </div>
  <div class="container">
    <nav class="flex justify-between items-center bg-purple-800 text-slate-50">
      <div class="flex items-center gap-5">
        <img src="../dist/logo.png" alt="Logo" class="logo">
        <h1 class="font-bold text-4xl italic">Pizzaria do 085</h1>
      </div>
      <ul class="flex text-xl font-bold">
        <li><a href="../index.php">Home</a></li>
        <?php 
          if (!isset($_SESSION['logado'])) {  
            header("location: ../index.php");
            echo '<script>var logged = false;</script>';
          }
          else {
            echo '<li><a href="../pedir.php">Pedir</a></li>
            <li id="logoutShow">Logout</li>';

            echo '<script>
            const logoutForm = document.querySelector(".logout-container");
            const cancelLogout = document.querySelector("#cancel-logout");
            const confirmLogout = document.querySelector("#logout");

            const logoutButton = document.querySelector("#logoutShow");
            logoutButton.addEventListener("click", showForm);

            function showForm(e) {
              if (e.target.id == "login") {
                form.classList.add("visible");
              }
              else {
                logoutForm.classList.add("visible");
              }
            }
            function cancelForm(e) {
              if (e.target.id == "cancel-form") {
                form.classList.remove("visible");
            
                clearInputs();
            
                inputs.forEach(input => {
                  unsetValidity(input)
                });
              }
              else {
                logoutForm.classList.remove("visible");
              }
            }
            </script>';
          }
        ?>
      </ul>
    </nav>
  </div>
    <h2 class="h2-comprar font-bold m-auto text-4xl">Pedido efetuado!</h2>
  <script src="../dist/addSelect.js"></script>
</body>
</html>