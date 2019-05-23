<?php

$conn = new PDO("mysql:host=localhost;dbname=dpphp7","root","");

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin=:LOGIN,desenha=:PASSWORD WHERE idusuario = :ID");

$login = "joao";
$password="qwerty";
$id=2;
$stmt->bindParam(":LOGIN",$login);

$stmt->bindParam(":PASSWORD",$password);

$stmt->bindParam(":ID",$id);

$stmt->execute();

echo "dados alterados";
?>