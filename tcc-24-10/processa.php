<?php
    session_start();
    ob_start();
    
include_once("conexao.php");

$pfp = rand(1, 6);
$pfp_u = $pfp . ".png";
$diretorio = "profile_pics/";
$path = $diretorio . $pfp . ".png";

$nome_u = filter_input(INPUT_POST, 'nome_u', FILTER_SANITIZE_SPECIAL_CHARS);
$senha_u = filter_input(INPUT_POST, 'senha_u', FILTER_SANITIZE_SPECIAL_CHARS);
$email_u = filter_input(INPUT_POST, 'email_u', FILTER_SANITIZE_EMAIL);
$endereco_u = filter_input(INPUT_POST, 'endereco_u', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone_u = filter_input(INPUT_POST, 'telefone_u', FILTER_SANITIZE_NUMBER_INT);
$cidade_u = filter_input(INPUT_POST, 'cidade_u', FILTER_SANITIZE_SPECIAL_CHARS);
$cep_u = filter_input(INPUT_POST, 'cep_u', FILTER_SANITIZE_NUMBER_INT);
$estado_u = filter_input(INPUT_POST, 'estado_u', FILTER_SANITIZE_SPECIAL_CHARS);
$datanascimento_u = filter_input(INPUT_POST, 'datanascimento_u', FILTER_SANITIZE_NUMBER_INT);

//fazer uma consulta procurando o login
$consulta = "SELECT email_u FROM usuarios WHERE email_u =:email_u  
                        LIMIT 1";
      
$result_consulta = $conexao->prepare($consulta);
$result_consulta->bindParam(':email_u', $email_u);
$result_consulta->execute();
        
 //var_dump ($result_usuario); 
 if(($result_consulta) AND ($result_consulta->rowCount() != 0)){
    $_SESSION['msg'] = "<p style='color: red'>Usuário já existe!</p>";
    header("Location: cadastro.php");
 } else 
 {  
            $result_usuarios = "INSERT INTO usuarios (nome_u, senha_u, email_u, endereco_u, telefone_u, 
                cidade_u, cep_u, estado_u, pfp_u, pfp_path_u, datanascimento_u, datacadastro_u, nvlacesso) 
                VALUES ('$nome_u', '$senha_u', '$email_u', '$endereco_u', '$telefone_u', '$cidade_u', 
                '$cep_u', '$estado_u', '$pfp_u', '$path', '$datanascimento_u', NOW(), 1)";


            if (mysqli_query($conn, $result_usuarios)) {
                
                header("location: index.php");

            } else {
                echo "Error: " . $result_usuarios . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            //$resultado_usuario = mysqli_query($conn, $result_usuarios); 
            //echo $result_usuarios;

            /*if(mysqli_insert_id($conn)){
                header("location: login.php");
            }; */ 
    }        
?>