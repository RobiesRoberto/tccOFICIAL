<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robies</title>
    <link rel="icon" type="image/png" href="img/LOGO.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
    <div class="LOGO">
    <img src="img/LOGO.png"></img>
    </div>
    </header>
    <div class="main-login">
        <div class="left-login">
            <div class="foto">
            <img src="img/foto entrar.png"></img>
        </div>
        </div>
            <div class="right-login">
        <div class="card-login">
      
        
            <h1>ENTRAR</h1>
            <?php
           
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      

    if (!empty($dados['SendLogin'])) {
        //var_dump($dados);
        $query_usuario = "SELECT id_usuario, nome_u, email_u, senha_u
                        FROM usuarios 
                        WHERE email_u =:email_u  
                        LIMIT 1";
      
        $result_usuario = $conexao->prepare($query_usuario);
        $result_usuario->bindParam(':email_u', $dados['email_u']);
        $result_usuario->execute();
        
       
        //var_dump ($result_usuario); 
        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        
        //if($result_usuario){  
            $row_usuario= $result_usuario->fetch(PDO::FETCH_ASSOC);
           //var_dump($row_usuario);
          // echo "Senha banco: ". $row_usuario['senha_u'];
           if ($dados['senha_u']== $row_usuario['senha_u']){
           //if(password_verify($dados['senha_u'], $row_usuario['senha_u'])){
                //echo "teste";
              //  echo "ola";
                $_SESSION['id_usuario'] = $row_usuario['id_usuario'];
                $_SESSION['nome_u'] = $row_usuario['nome_u'];
                //echo "Usuario: ".$row_usuario['id_u'];
                //echo "Senha: ".$row_usuario['senha_u'];
                header("Location: pagina_inicial.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: senha inválida!</p>";
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário  inválida!</p>";
        }

        
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
            <div class="textfield">
               <form method="post" action="">
                <label for="email">Email</label> 
                <input type="text" name="email_u" placeholder="Digite o e-mail" class="textfield"
                value="<?php if(isset($dados['email_u'])){ echo $dados['email_u']; } ?>">
               <br>
               <label for="senha">Senha</label> 
               <input type="password" name="senha_u" placeholder="Digite a senha" class="textfield"
               value="<?php if(isset($dados['senha_u'])){ echo $dados['senha_u']; } ?>">
            </div> 
              
           <input type="submit" value="Entrar" name="SendLogin" class="btn-login">
           <a  href="cadastro.php" class="btn-cadastro" >Cadastrar</a>
           </form>
      </div>
        </div>
    </div>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <div class="fotologo">
                <img src="img/LOGO.png"></img>
               <p>Redes sociais</p>
                <div id="footer_social_media">
              
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook" ></i>
                    </a>   
                </div>
            </div> 
    </footer>
</div>
<div id="footer_copyright">
    &#169
    2023 all rights reserved
</div>
</body>
</html>