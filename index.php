<?php 
  session_start();
  $erro = '';
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
  <link rel="icon" type="image/x-icon" href="./dist/favicon.ico">
  <link rel="stylesheet" href="./dist/style.css">
  <title>Pizzaria do 085</title>
</head>
<body>
  <div class="form-container">
    <form action="" method="POST">
      <h2 class="font-bold text-3xl">Login</h2>

      <input type="email" placeholder="Email" id="email" name="email" maxlength="80" required>
      <input type="password" placeholder="Senha" id="senha" name="senha" maxlength="80" required>

      <button type="submit" class='logar' id="login-show">Login</button>
      <button type="button" class='cancel' id="cancel-form">Cancelar</button>
      <?php echo '<h3 class="font-bold text-red-700">'.$erro.'</h3>' ?>
    </form>
  </div>
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
        <img src="./dist/logo.png" alt="Logo" class="logo">
        <h1 class="font-bold text-4xl italic">Pizzaria do 085</h1>
      </div>
      <ul class="flex text-xl font-bold">
        <li><a href="#">Home</a></li>
        <?php 
          if (!isset($_SESSION['logado'])) {         
              echo '<li id="login">Login</li>
              <li id="cadastro">Cadastro</li>';

              echo '<script>var logged = false;</script>';
          }
          else {
            echo '<li id="pedir">Pedir</li>
            <li id="logoutShow">Logout</li>';

            echo '<script>var logged = true;</script>';
          }
        ?>
      </ul>
    </nav>
    <main class="flex items-center flex-col mb-14">
      <h2 class="mb-1 font-bold text-3xl text-slate-900">Peça já e receba em até <span class="italic text-purple-800">30 minutos</span></h2>
      <div class="layout grid">
        <div class="c1 bg-red-500"></div>
        <div class="c2 bg-emerald-700"></div>
        <div class="c3 bg-slate-700"></div>
        <div class="c4 bg-blue-700"></div>
      </div>
      
    </main>
    <footer>

    </footer>
  </div>
  <script src="./dist/index.js"></script>
</body>
</html>
<?php
  if($_POST) {
  include './php/conexao.php';

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
      $_SESSION['logado'] = true;
      
      header("location: ./index.php");
    }
    else {
      $erro = 'Email ou senha inválidos';
    }
  }
  }
?>