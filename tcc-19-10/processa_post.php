<?php
    session_start();
    ob_start();
    include_once("conexao.php");
    $status=false;
    $extensao="";
    //$imagem="vazio";
    //if(isset($_FILES['img'])){
     if (!empty($_FILES['img']))
        echo "tem";

        $imagem_post = $_FILES['img'];
        
        if($imagem_post['error']){
            $imagem="vazio";
           // die("Falha ao enviar");    
        } 
        
        //limita o tamanho do arquivo
       /* if $imagem_post['size'] > 2097152){
            echo ("Arquivo muito grande(>2MB)");
            $diretorio = "imagens_post/";
        } */
        $diretorio = "imagens_post/";

        $nome_img = $imagem_post['name'];
        if ($nome_img){
        //define um novo e unico nome para o arquivo
        $new_nome_img = uniqid();
         //isola a extensao do arquivo(png, jpg, etc)
         $extensao = strtolower(pathinfo($nome_img, PATHINFO_EXTENSION));
         $status=true;
        } 

       
        //limita a extensao do arquivo para 'jpg' ou 'png'
        if ($extensao!="")
            if($extensao !="jpg" && $extensao !="png")die("Tipo de arquivo inválido");
        
        //salva a imagem na pasta com o novo nome(uniqid.extensao)
        if ($status==true){
            $path = $diretorio . $new_nome_img . "." . $extensao;
            $img_ok = move_uploaded_file($imagem_post["tmp_name"], $path);
        } else {
            $path ="";
        }

        $titulo_post = $_POST['titulo_post'];
        $texto_post = $_POST['texto_post'];
        echo "$texto_post";
        if (($texto_post!="") or ($status)){

            $idusuario=$_SESSION['id_usuario'];
            $conn->query("INSERT INTO postagem (id_usuario, titulo_post, texto_post, img_post, path_post) 
                                    VALUES ('$idusuario','$titulo_post', '$texto_post','$nome_img', '$path')") 
                                    or die($conn->error);
            
            
            //grava o nome/endereço da imagem no banco    
            /*if($img_ok){
            $idusuario=$_SESSION['id_usuario'];
                    $conn->query("INSERT INTO postagem (img_post, path_post) 
                                    VALUES ('$nome_img', '$path')") 
                                    or die($conn->error);                            
                                }else echo "Falha ao enviar arquivo de imagem";
                            }   */
                            
        /*  $conn->query("INSERT INTO postagem (titulo_post, texto_post)
                        VALUES ('$titulo_post', '$texto_post')")
                        or die($conn->error);} */
           }  else echo("Falha ao enviar");            
        //}   
?>

