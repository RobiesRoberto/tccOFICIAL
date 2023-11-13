<?php 
session_start();
ob_start();
include_once 'conexao.php';

$consulta = $conn->query("SELECT p.id_post, u.nome_u, p.titulo_post, p.texto_post, 
                            p.img_post, p.path_post, p.data_post
                            from usuarios u, postagem p
                            where u.id_usuario=p.id_usuario 
                            ORDER BY p.id_post DESC;")
                            or die($conn->error);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="pagina_inicial.php">Voltar</a>
<?php while($dado = $consulta->fetch_array()){ ?>
    <div>
        <h1><?php echo $dado["titulo_post"];?> </h1>
        <img src="<?php echo $dado['path_post'];?>">
        <p style="text-align: justify;"><?php echo $dado["texto_post"];?></p>
        <p>Postado por <a href=""><?php echo $dado["nome_u"];?></a> 
        <?php echo date("d/m/Y", strtotime($dado["data_post"]));?></p>
    </div><br><br>
    <?php }?>
</body>
</html>


