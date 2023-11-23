<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "robies";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname); 

try{
    $conexao = new PDO("mysql:servidor=$servidor;dbname=" . $dbname, $usuario, $senha);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
?>