<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

/*  Carrega um usuário
$root = new Usuario();
$root->loadById(3);
echo $root;*/

//$lista = Usuario::getList();
//echo json_encode($lista);

/*carrega pelo login
$search = Usuario::search("se");
echo json_encode($search);
*/

//carrega pelo login e senha
//$usuario = new Usuario();
//$usuario->login("jose","1234567890");
//echo $usuario;

/*Inserção de um registro
$aluno = new Usuario();
$aluno->setDeslogin("aluno");
$aluno->setDesenha("@lun0");
$aluno->insert();

echo $aluno;*/

/*
//Insere dados na tabela
$aluno = new Usuario("alunobitch","bitch");
$aluno->insert();
echo $aluno;
*/

/*
//Executa uma atualização na tabela apartir do ID
$usuario = new Usuario();
$usuario->loadById(8);
$usuario->update("professor","!@#$%¨*");

echo $usuario;
*/
$usuario = new Usuario();
$usuario->loadById(3);

$usuario->delete();

echo $usuario;


?>