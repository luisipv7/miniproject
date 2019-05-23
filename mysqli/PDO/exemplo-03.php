<?php

$conn = new PDO("mysql:host=localhost;dbname=dpphp7","root","");

$stmt = $conn->prepare("INSERT INTO tb_usuarios(deslogin,desenha)VALUES(:LOGIN,:PASSWORD)");

$login = "jose";
$password="1234567890";

$stmt->bindParam(":LOGIN",$login);

$stmt->bindParam(":PASSWORD",$password);

$stmt->execute();

echo "inserido OK";
?>