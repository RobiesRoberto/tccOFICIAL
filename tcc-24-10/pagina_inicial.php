<?php
session_start();
ob_start();
include_once 'conexao.php';

if((!isset($_SESSION['id_usuario'])) AND (!isset($_SESSION['nome_u']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: pagina_inicial.php");
}
if($conn->connect_error){ die("errro" . $conn->connect_error);}
$sql = "SELECT pfp_path_u, pfp_u FROM usuarios"; 
$result = $conn->query($sql); 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Robies - Login</title>
</head>
<body>
    <p>Bem vindo <?php echo $_SESSION['nome_u']; ?>!<img src="
        <?php 
            if($result->num_rows > 0){
            } while($row = $result->fetch_assoc()){
                echo $row['pfp_path_u'];
            };
            $conn->close();
            
        ?>"
    style="height: 50px; width: 50px; border-radius: 50%;"></p>
    <a href="editar_perfil.php">Editar usuario</a>
    <a href="sair.php">Sair</a><br><br>
    <div style="justify-content: center; align-items: center; display: flex; align-self: center;">
        <form method="POST" enctype="multipart/form-data" action="processa_post.php">
            <input type="text" name="titulo_post" placeholder="Título" required><br>
            <input type="text" name="texto_post" placeholder="Conteúdo"><br>
            <label for="">Selecione o arquivo</label>
            <input name="img" type="file"><br>
            <button name="posta" type="submit">Postar</button>
            <br><br><br><a href="verposts.php">Navegar entre posts</a>
        </form>
    </div>
</body>

</html>