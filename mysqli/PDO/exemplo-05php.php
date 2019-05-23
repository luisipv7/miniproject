<?php

$conn = new PDO("mysql:host=localhost;dbname=dpphp7","root","");

$stmt = $conn->prepare("DELETE FROM tb_usuarios  WHERE idusuario = :ID");


$id=1;


$stmt->bindParam(":ID",$id);

$stmt->execute();

echo "dados EXLUIDOS";
?>