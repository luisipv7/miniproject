<?php

require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();


$cad->setNome("Luis");
$cad->setEmail("luis@luis.com.br");
$cad->setSenha("123456");

$cad->registrarVenda();

echo $cad;



?>