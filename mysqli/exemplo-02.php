<?php

$conn = new mysqli("localhost","root","","dpphp7");

if ($conn->connect_error) {
    echo "Error:". $conn->connect_error;
    exit;
}

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY deslogin");

$data = array();

while ($linha = $result->fetch_array()) {
    array_push($data,$linha);
    //var_dump($linha);
}

echo json_encode($data);

?>
