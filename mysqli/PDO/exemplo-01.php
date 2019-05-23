<?php

$conn = new PDO("mysql:dbname=dpphp7;host=localhost","root","");

$stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY deslogin");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $linha){

    foreach ($linha as $key => $value) {
        echo "<strong>".$key.":</strong>".$value."<br/>";
    }
    echo "==========================================<br/>";
}

//var_dump($results);

?>