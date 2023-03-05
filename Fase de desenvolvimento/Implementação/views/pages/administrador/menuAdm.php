<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != "1") {
    header("Location: /");
    exit();
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="views/css/stylepagAdm.css">
        <link rel="stylesheet" href="views/css/stlylemodal.css">
        <title>Biblioteca Científica Digital</title>
    </head>

    <body>
        <header>
            <div class = "container">
                <div class = "logo"><a href="indexAdm.html"><img src="views/img/logo.png" style="width: 200px; height: 120px;"></a></div>
                <div class = "menu">
                    <nav>
                        <a href="indexAdm.html#Sobre">Sobre</a>
                        <a href="indexAdm.html#Colaborador">Quero ser colaborador</a>
                        <a href="indexAdm.html#Artigo">Submeta seu artigo</a>
                        <a href="indexAdm.htmleventos.html">Eventos</a>
                        <a href="/homeAdm">Menu</a>
                    </nav>
                </div>

                <div class= "login">
                    <?php echo '<p>Bem-vindo, ' . $_SESSION['nome_usuario'] . '!</p>';?>
                    </br>
                    <button id="btn1">Sair</button>
                </div> 
                  
            <div>
        </header>  

        <section>
            <!-- Modal de logout-->
            <div id="modal1" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="/logout">
                                <div class="dentro-form">
                                    <h2>Deseja Sair do Sitema?</h2></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit" name="logout">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id ="cancel-button1">Cancelar</button>
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
                        </br></br></br>
                        <div class="dentro_bloco">
                            <a href="/eventosAdm"><h3>Gerenciar Eventos</h3></a>
                        </div>
                        </br>
                        <div class="dentro_bloco" >
                            <a href="/organizadoresAdm"><h3>Gerenciar Organizadores</h3></a>
                        </div>
                        </br>
                        <div class="dentro_bloco" >
                            <a href="/artigosAdm"><h3>Gerenciar Artigos</h3></a>
                        </div>
                        </br>
                        <div class="dentro_bloco">
                            <a href="/autoresAdm"><h3>Gerenciar Autores</h3></a>
                        </div>
                        </br>
                        <div class="dentro_bloco"> 
                        <a href="/secretario"><h3>Gerenciar Secretário</h3></a>
                        </div>
                        </br>
                        
                        </br></br></br>
                    </div>
                </div>
            </div>   
        </section>

        
        <script src="views/js/jquery-3.6.0.min.js"></script> 
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
                    <img src="views/img/logo.png" style="width: 200px; height: 120px;">
                    <div class="text">   
                        <h2>BCD © 2023 | All rights reserved.</h2>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
