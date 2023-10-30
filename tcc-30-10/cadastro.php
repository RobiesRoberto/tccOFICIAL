<?php
    session_start();
    ob_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robies</title>
    <link rel="icon" type="image/png" href="img/LOGO.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css//cadastro.css">
</head>
<body>
    <header>
        <div class="LOGO">
        <img src="img/LOGO.png"></img>
        </div>
        </header>
        <div class="center-cadastro">
        <div class="card-cadastro">
              <section>
                <h1>CADASTRO</h1>
                <form action="processa.php" method="post">
                <fieldset>
                    <div class="container">
                        <label></label>
                        <input type="text" name="nome_u" required placeholder="Nome" autofocus>  
                    </div> 
                    <div class="container">
                        <label></label>
                        <input type="password" name="senha_u" placeholder="Senha" required> 
                    </div> 
                </fieldset>
                <fieldset>
                <div class="container">
                    <label></label>
                    <input type="email" name="email_u" placeholder="Email" required> 
                </div> 
                    <div class="container">
                        <label></label>
                        <input type="text" name="endereco_u" placeholder="Endereço" required> 
                    </div> 
            </fieldset>
            <fieldset>
                <div class="container">
                    <label></label>
                    <input type="text" placeholder="Telefone" required name="telefone_u"> 
                </div> 
                <div class="container">
                    <label></label>
                    <input type="text" placeholder="Cidade" required name="cidade_u"> 
                </div> 
            </fieldset>
            <fieldset>
                <div class="container">
                    <label></label>
                    <input type="text" placeholder="Cep" required name="cep_u"> 
                </div> 
                <div class="UF" >
                    <label></label>
                        <select class="UF-box" required name="estado_u">
                            <option value="">Estado</option> 
                            <option value="ac"> Acre</option> 
                            <option value="al"> Alagoas</option> 
                            <option value="am"> Amazonas</option> 
                            <option value="ap"> Amapá</option> 
                            <option value="ba"> Bahia</option> 
                            <option value="ce"> Ceará</option> 
                            <option value="df"> Distrito Federal</option> 
                            <option value="es"> Espírito Santo</option> 
                            <option value="go"> Goiás</option> 
                            <option value="ma"> Maranhão</option> 
                            <option value="mt"> Mato Grosso</option> 
                            <option value="ms"> Mato Grosso do Sul</option> 
                            <option value="mg"> Minas Gerais</option> 
                            <option value="pa"> Pará</option> 
                            <option value="pb"> Paraíba</option> 
                            <option value="pr"> Paraná</option> 
                            <option value="pe"> Pernambuco</option> 
                            <option value="pi"> Piauí</option> 
                            <option value="rj"> Rio de Janeiro</option> 
                            <option value="rn"> Rio Grande do Norte</option> 
                            <option value="ro"> Rondônia</option> 
                            <option value="rs"> Rio Grande do Sul</option> 
                            <option value="rr"> Roraima</option> 
                            <option value="sc"> Santa Catarina</option> 
                            <option value="se"> Sergipe</option> 
                            <option value="sp"> São Paulo</option> 
                            <option value="to"> Tocantins</option> 
                        </select>
                </div>  
                <div class=" container">
                    <label></label>
                    <label for="txnascimento"></label>
                    <input type="date"  id="txnascimento" required name="datanascimento_u" autofocus>
                </div>   
            </fieldset>
            <div id="check">
                <input type="checkbox" required name="accept">
                <label>Aceitar os termos de uso</label>    
                <fieldset>
            </div> 
            <div style="display:flex">
                <input  type="submit"  value="Cadastrar">
                <a href="index.php" class="btn-entrar" >Entrar</a>
            </div></fieldset>   
                <a href="#">Ler termos de uso</a>
            </div> 
        <?php
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
        ?>
    
</form>
              </section>  
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