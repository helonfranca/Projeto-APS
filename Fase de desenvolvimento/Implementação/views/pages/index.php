<?php
session_start(); // deve ser chamado antes de qualquer saída HTML
 
if (isset($_SESSION['tipo_usuario'])) {
    switch ($_SESSION['tipo_usuario']) {
        case "1": 
            header("Location: ../pages/adm/MenuAdm.php");
            exit();
        case "2": 
            header("Location: ../pages/Secretário/MenuSecretário.php");
            exit();
        default: 
            header("Location: ../pages/index.php");
            exit();
    }
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/stlylemodal.css">
        <title>Biblioteca Científica Digital</title>
    </head>

    <body>
        <header>
            <div class = "container">
                <div class = "logo"><a href="index.html"><img src="../img/logo.png" style="width: 200px; height: 120px;"></a></div>
                <div class = "menu">
                    <nav>
                        <a href="#Sobre">Sobre</a>
                        <a href="#Colaborador">Quero ser colaborador</a>
                        <a href="#Artigo">Submeta seu artigo</a>
                        <a href="eventos.html">Eventos</a>
                    </nav>
                </div>

                <div class= "login">
                    <button id="btn1">Entrar</button>
                </div> 
                  
            <div>
        </header>  

        <section>
            <div id="modal1" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="../../controller/LoginController.php">
                                <div class="dentro-form">
                                    <h2>Área de gerenciamento</h2></br>
                                    <h3>Insira suas credenciais:</h3></br>
                                    <div class= "form-dados">
                                        <label for="Email">Email:</label></br>
                                        <input type="email" id="email" name="email" placeholder="Exemplo@gmail.com" required>
                                        </br>
                                        <label for="password">Senha:</label></br>
                                        <input type="password" id="senha" name="senha" placeholder="Senha" required>
                                    </div>
                                    <?php
                                        if (isset($_SESSION['login_erro'])) { // verifica se a variável de sessão existe
                                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_erro'] . '</div>'; // exibe a mensagem de erro
                                            unset($_SESSION['login_erro']); // remove a variável de sessão
                                        }
                                    ?>
                                    </br></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit" submit="">Confirmar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button1">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="conjunto">
                <div class = "navegacao">
                    <div class="blocos">
                        </br></br></br></br></br>
                        <div class="dentro_bloco" id="Colaborador">
                            <h3>Sobre a Biblioteca Científica Digital</h3>
                            <a>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus congue lacus tellus, ut semper ligula tristique in. Ut a varius lorem, eu egestas mi.
                                Aliquam sodales faucibus lacus eu faucibus. Ut pulvinar dictum faucibus. Donec et consectetur nisi, eget dignissim turpis. Quisque eget vestibulum dui, vel tristique ante.
                                Duis id odio in lorem rhoncus sodales. Nam in turpis vitae nisl mattis lacinia. Aenean ullamcorper consectetur erat ut sagittis.
                                Nam non purus vestibulum, sodales nisl quis, maximus purus. Vivamus finibus tempor tristique.
                            </a>
                        </div>
                        </br></br></br>
                        <div class="dentro_bloco" id="Colaborador">
                            <h3>Quero ser um Colaborador</h3>
                            <a>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus congue lacus tellus, ut semper ligula tristique in. Ut a varius lorem, eu egestas mi.
                                Aliquam sodales faucibus lacus eu faucibus. Ut pulvinar dictum faucibus. Donec et consectetur nisi, eget dignissim turpis. Quisque eget vestibulum dui, vel tristique ante.
                                Duis id odio in lorem rhoncus sodales. Nam in turpis vitae nisl mattis lacinia. Aenean ullamcorper consectetur erat ut sagittis.
                                Nam non purus vestibulum, sodales nisl quis, maximus purus. Vivamus finibus tempor tristique.
                            </a>
                        </div>
                        </br></br></br>
                        <div class="dentro_bloco" id="Artigo">
                            <h3>Submeta seu Artigo</h3>
                            <a>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus congue lacus tellus, ut semper ligula tristique in. Ut a varius lorem, eu egestas mi.
                                Aliquam sodales faucibus lacus eu faucibus. Ut pulvinar dictum faucibus. Donec et consectetur nisi, eget dignissim turpis. Quisque eget vestibulum dui, vel tristique ante.
                                Duis id odio in lorem rhoncus sodales. Nam in turpis vitae nisl mattis lacinia. Aenean ullamcorper consectetur erat ut sagittis.
                                Nam non purus vestibulum, sodales nisl quis, maximus purus. Vivamus finibus tempor tristique.
                            </a>
                        </div>
                        </br></br></br></br></br></br>
                    </div>
                </div>
            </div>   
        </section>

        <script src="../js/jquery-3.6.0.min.js"></script> 
        <script>
            $(document).ready(function(){
                $("#btn1").click(function(){
                    $("#modal1").show();
                });              
                $("#cancel-button1").click(function(){
                    $("#modal1").hide();
                });
            });        
        </script> 

        <footer>
            <div class="wrapper">
                <div class="company-footer">
                    <img src="../img/logo.png" style="width: 200px; height: 120px;">
                    <div class="text">   
                        <h2>BCD © 2023 | All rights reserved.</h2>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>

