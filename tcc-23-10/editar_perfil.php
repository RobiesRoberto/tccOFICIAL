<?php 
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_FILES['img'])){
    $imagem_post = $_FILES['img'];
    if($imagem_post['error'])die("Falha ao enviar");
    //limita o tamanho do arquivo
    //if($imagem_post['size'] > 2097152)die("Arquivo muito grande(>2MB)");
    $diretorio = "profile_pics/";
    $nome_img = $imagem_post['name'];
    //define um novo e unico nome para o arquivo
    $new_nome_img = uniqid();
    //isola a extensao do arquivo(png, jpg, etc)
    $extensao = strtolower(pathinfo($nome_img, PATHINFO_EXTENSION));
    //limita a extensao do arquivo para 'jpg' ou 'png'
    if($extensao !="jpg" && $extensao !="png")die("Tipo de arquivo inválido");
    
    //salva a imagem na pasta com o novo nome(uniqid.extensao)
    $path = $diretorio . $new_nome_img . "." . $extensao;
    $img_ok = move_uploaded_file($imagem_post["tmp_name"], $path);
    //grava o nome/endereço da imagem no banco    
    if($img_ok){
            $conn->query("UPDATE INTO usuarios (pfp_u, pfp_path_u) 
                            VALUES ('$nome_img', '$path')") 
                            or die($conn->error);                            
                        }else echo "Falha ao enviar arquivo de imagem";
                    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" name="up_nome_u">
        <input type="file" name="img">
        <button name="edita_user" type="submit">Salvar</button>
    </form>
</body>
</html>
