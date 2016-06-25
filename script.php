<?php
//Change here to create your own database
$servername = "localhost";
$username = "root";
$password = "";
global $sql;

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE galeria";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Banco de dados Galeria Criado com Sucesso<br>";
    }
catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

<?php
//Change here to create your own database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "galeria";
global $sql;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
	$sql = "CREATE TABLE fotos ( 
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	img MEDIUMBLOB,
	data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Tabela Fotos Criada com Sucesso";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>