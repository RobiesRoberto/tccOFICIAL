<?php
session_start();
ob_start();
include_once 'conexao.php';
$id_usuario = $_SESSION['id_usuario'];

$resultado = $conn->query("SELECT p.id_post, u.id_usuario, u.nome_u, p.titulo_post, p.texto_post, 
                            p.img_post, p.path_post, p.data_post
                            from usuarios u, postagem p
                            where u.id_usuario=p.id_usuario and u.id_usuario=$id_usuario");




if((!isset($_SESSION['id_usuario'])) AND (!isset($_SESSION['nome_u']))){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: pagina_inicial.php");
}
if($conn->connect_error){ die("errro" . $conn->connect_error);}
$sql = "SELECT pfp_path_u, pfp_u FROM usuarios WHERE id_usuario=$id_usuario"; 
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
    <div style="justify-content: center; align-items: center; align-self: center;">
        <form method="POST" enctype="multipart/form-data" action="processa_post.php">
            <input type="text" name="titulo_post" placeholder="Título" required><br>
            <input type="text" name="texto_post" placeholder="Conteúdo"><br>
            <label for="">Selecione o arquivo</label>
            <input name="img" type="file" id="img"><br>
            <a href="#" class="thumbnail">
                <img src="imagens_post/padrao.png" height="150" width="150" id="img-post">
            </a><br>
            <button name="posta" type="submit">Postar</button>
            <br><br><br><a href="verposts.php">Navegar entre posts</a>
        </form>

        <?php while($dado = $resultado->fetch_array()){ ?>
    <div>
        <h1><?php echo $dado["titulo_post"];?> </h1>
        <img src="<?php echo $dado['path_post'];?>">
        <p style="text-align: justify;"><?php echo $dado["texto_post"];?></p>
        <p>Postado por <a href=""><?php echo $dado["nome_u"];?></a> 
        <?php echo date("d/m/Y", strtotime($dado["data_post"]));?></p>
        <button id="delete_post" >Deletar post</button>
    </div><br><br>
    <?php }?>    
    </div>
    <script>
	    var inputFile = document.getElementById("img");
	    var img_post = document.getElementById("img-post");
	    if(inputFile != null && inputFile.addEventListener) {
		    inputFile.addEventListener("change", function(){loadFoto(this, img_post)});
	    } else if (inputFile != null && inputFile.attachEvent) {
		    inputFile.attachEvent("onchange", function() {loadFoto(this, img_post)});
	    }
        function loadFoto(file, img){
		if (file.files && file.files[0]) {
			var reader = new FileReader();
		 reader.onload = function (e) {
			 img.src = e.target.result;
		 }
		 reader.readAsDataURL(file.files[0]);
		}	
	}
</script>
</body>
</html>