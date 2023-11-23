<?php 
session_start();
ob_start();
include_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_SESSION["id_usuario"];
    $nome = $_POST["nome_u"];
    $imagem_post = $_FILES['pfp_path_u'];
    // Verifica se uma nova foto foi enviada
    if ($_FILES["pfp_path_u"]["error"] == 0) {
        $foto = addslashes(file_get_contents($_FILES["pfp_path_u"]["tmp_name"]));
        $path = "profile_pics/" . $foto;
        $img_ok = move_uploaded_file($imagem_post["pfp_path_u"], $path);
        $sql = "UPDATE usuarios SET nome_u='$nome', pfp_path_u='$path' WHERE id_usuario=$id";
    } else {
        $sql = "UPDATE usuarios SET nome_u='$nome' WHERE id_usuario=$id";
    }

    // Executa a atualização no banco de dados
    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
        $query_usuario = "SELECT id_usuario, nome_u, email_u, senha_u
        FROM usuarios 
        WHERE id_usuario =:id  
        LIMIT 1";

        $result_usuario = $conexao->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                
            //if($result_usuario){  
                $row_usuario= $result_usuario->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id_usuario'] = $row_usuario['id_usuario'];
                $_SESSION['nome_u'] = $row_usuario['nome_u'];
            } else {
                echo "Erro ao atualizar o registro: " . $conn->error;
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição</title>
</head>
<body>
    <a href="pagina_inicial.php">voltar</a>
    <?php
    // Recupera os dados do usuário do banco de dados usando a sessão
    $id = $_SESSION["id_usuario"];
    $sql = "SELECT id_usuario, nome_u, pfp_path_u FROM usuarios WHERE id_usuario=$id";
    $result = $conn->query($sql);
    // Verifica se o usuário existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome_u"];
        $foto = $row["pfp_path_u"];
    } else {
        echo "Usuário não encontrado!";
        exit();
    }
    ?>
    <h2>Formulário de Edição</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <label for="nome_u">Nome:</label>
        <input type="text" id="nome_u" name="nome_u" value="<?php echo $nome; ?>" required><br><br>
        <label for="pfp_path_u">Foto:</label>
        <input type="file" id="pfp_path_u" name="pfp_path_u"><br><br>
        <?php if ($foto): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" alt="Foto do Usuário" width="150"><br><br>
        <?php endif; ?>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>