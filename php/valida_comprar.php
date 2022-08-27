<?php
    include 'conexao.php';
    $id_cliente = 'SELECT id_cliente FROM cliente WHERE email = '.$_SESSION['email'];
    $id_produto = $_POST['produto'];
    $endereço_pedido = $_POST['endereco'];
    $sql = "INSERT INTO pedido (id_cliente, id_produto, endereço_pedido) VALUES (".$id_cliente.",".$id_produto.",'".$endereço_pedido."')";
    $res = mysqli_query($con,$sql) or die("Erro na inserção");

    mysqli_close($con);
    header('location: index.php');
?>