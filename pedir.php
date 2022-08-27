<?php 
  session_start();
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
        <li><a href="./index.php">Home</a></li>
        <?php 
          if (!isset($_SESSION['logado'])) {  
            header("location: index.php");
            echo '<script>var logged = false;</script>';
          }
          else {
            echo '<li><a href="./pedir.php">Pedir</a></li>
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
    <form action="./php/valida_comprar.php" class="m-auto grid justify-center mb-14 form-pedido">
      <h2 class="font-bold">Faça seu pedido</h2>
      <div class="itens">
        <select class="text-black" name="produto" required>
            <optgroup label="Pizza Pequena">
              <option value="1">Pizza P de Mussarela - 25$</option>
              <option value="2">Pizza P de Calabresa - 25$</option>
              <option value="3">Pizza P de Portuguesa - 25$</option>
            </optgroup>
            <optgroup label="Pizza Média">
              <option value="4">Pizza M de Mussarela - 33.50$</option>
              <option value="5">Pizza M de Calabresa - 33.50$</option>
              <option value="6">Pizza M de Portuguesa - 33.50$</option>
            </optgroup>
            <optgroup label="Pizza Grande">
              <option value="7">Pizza G de Mussarela - 40$</option>
              <option value="8">Pizza G de Calabresa - 40$</option>
              <option value="9">Pizza G de Portuguesa - 40$</option>
            </optgroup>
            <optgroup label="Bebidas">
              <option value="10">Coca 310ml - 4.5$</option>
              <option value="11">Coca 1L - 14$</option>
              <option value="12">Água 510ml - 3$</option>
            </optgroup>
        </select>
      </div>
      <label for="endereco">Endereço</label><input type="text" placeholder="Bairro Retiro, Rua 52, n°4" name="endereco" id="endereco" class="validCheck" minlength="10" required>

      <button type="submit" class='logar'>Pedir</button>
    </form>
  </div>
</body>
</html>