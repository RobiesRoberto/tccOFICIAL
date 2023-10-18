<?php
session_start();
ob_start();
include_once 'conexao.php';

if((!isset($_SESSION['id_usuario'])) AND (!isset($_SESSION['nome_u']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: pagina_inicial.php");
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Robies - Login</title>
</head>
<body>
    <p>Bem vindo <?php echo $_SESSION['nome_u']; ?>!<img src="profile_pics/usuario2.png"
    style="height: 50px; width: 50px; border-radius: 50%;"></p>
    <a href="editar_perfil.php">Editar usuario</a>
    <a href="sair.php">Sair</a><br><br>
    <div style="justify-content: center; align-items: center; display: flex; align-self: center;">
        <form method="POST" enctype="multipart/form-data" action="processa_post.php">
            <input method="POST" type="text" name="titulo_post" placeholder="Título" required><br>
            <input method="POST" type="text" name="texto_post" placeholder="Conteúdo"><br>
            <label for="">Selecione o arquivo</label>
            <input name="img" type="file"><br>
            <button name="posta" type="submit">Postar</button>
            <br><br><br><a href="verposts.php">Navegar entre posts</a>
        </form>
    </div>
</body>

</html>