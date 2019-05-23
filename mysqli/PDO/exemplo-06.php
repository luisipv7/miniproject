<?php

$conn = new PDO("mysql:host=localhost;dbname=dpphp7","root","");

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM tb_usuarios  WHERE idusuario = ?");

$id=2;

$stmt->execute(array($id));

// rollback cancela a ação anterior.
$conn->rollBack();
// commit confirma a ação anterior.
$conn->commit();

echo "dados EXCLUIDOS";
?>