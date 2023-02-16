<?php

require_once("../../../../controller/verificarAutor.php");


/*
session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != "2") {
    header("Location: ../index.php");
    exit();
}
*/



?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/style.css">
        <link rel="stylesheet" href="../../../css/stylecrud.css">
        <link rel="stylesheet" href="../../../css/stlylemodal.css">
        
        <title>Biblioteca Científica Digital</title>
    </head>

    <body>
        <header>
            <div class = "container">
                <div class = "logo"><a href="indexSecretário.html"><img src="../../../img/logo.png" style="width: 200px; height: 120px;"></a></div>
                <div class = "menu">
                    <nav>
                        <a href="IndexSecretário.html#Sobre">Sobre</a>
                        <a href="IndexSecretário.html#Colaborador">Quero ser colaborador</a>
                        <a href="IndexSecretário.html#Artigo">Submeta seu artigo</a>
                        <a href="eventos.html">Eventos</a>
                        <a href="MenuSecretário.html">Menu</a>
                    </nav>
                </div>

                <div class= "login">
                    <button id="btn1">Sair</button>
                </div> 
                  
            <div>
        </header>  

        <section>
            <!-- Modal de Logout -->
            <div id="modal1" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h2>Deseja Sair do Sitema?</h2></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button1">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Adicionar Autores -->
            <div id="modal2" name="modal2" style="display: none; ">
                <div id="modal" name="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="../../../../controller/GerenciamentoAutor.php">
                                <div class="dentro-form">
                                    <h1>Adicionar novo autor</h1></br>
                                    <div class= "form-dados">
                                        <label for="nome">Nome do Autor:</label></br>
                                        <input type="text" id="nome" name="nome" placeholder="" required></br>
                                        <label for="DataDeNascimento">Data de Nascimento:</label></br>
                                        <input type="date" id="DataDeNascimento" name="DataDeNascimento" placeholder="" required></br>
                                        <label for="CurriculoLattes">Curriculo-lattes:</label></br>
                                        <input type="text" id="CurriculoLattes" name="CurriculoLattes" placeholder="" required></br>
                                        <label for="Instituição">Instituição:</label></br>
                                        <input type="text" id="Instituição" name="instituicao" placeholder="" required></br>
                                        Sexo:</br>
                                            <label for="feminino">Feminino</label>
                                            <input type="radio" id="Feminino" name="sexo" value="feminino"></br></br>
                                             <label for="masculino">Masculino</label>
                                            <input type="radio" id="Masculino" name="sexo" value="masculino"></br></br>                                           
                                    
                                        <label for="Telefone">Telefone:</label></br>
                                        <input type="number" id="Telefone" name="telefone" placeholder=""></br>
                                    </div>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button2">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Verificar autor -->
            <div id="modal3" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Dados Autor</h1></br>
                                    <div class= "form-dados">
                                    <label for="nome">Nome do Autor:</label></br>
                                        <input type="text" id="nome" name="nome" placeholder="" required></br>
                                        <label for="DataDeNascimento">Data de Nascimento:</label></br>
                                        <input type="date" id="DataDeNascimento" name="DataDeNascimento" placeholder="" required></br>
                                        <label for="CurriculoLattes">Curriculo-lattes:</label></br>
                                        <input type="text" id="CurriculoLattes" name="CurriculoLattes" placeholder="" required></br>
                                        <label for="Instituição">Instituição:</label></br>
                                        <input type="text" id="Instituição" name="instituicao" placeholder="" required></br>
                                        Sexo:</br>
                                            <label for="feminino">Feminino</label>
                                            <input type="radio" id="Feminino" name="sexo" value="feminino"></br></br>
                                             <label for="masculino">Masculino</label>
                                            <input type="radio" id="Masculino" name="sexo" value="masculino"></br></br>                                           
                                    
                                        <label for="Telefone">Telefone:</label></br>
                                        <input type="number" id="Telefone" name="telefone" placeholder=""></br>
                                    </div>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button3">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Editar autor-->
            <div id="modal4" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Editar Autor</h1></br>
                                    <div class= "form-dados">
                                    <label for="nome">Nome do Autor:</label></br>
                                        <input type="text" id="nome" name="nome" placeholder="" required></br>
                                        <label for="DataDeNascimento">Data de Nascimento:</label></br>
                                        <input type="date" id="DataDeNascimento" name="DataDeNascimento" placeholder="" required></br>
                                        <label for="CurriculoLattes">Curriculo-lattes:</label></br>
                                        <input type="text" id="CurriculoLattes" name="CurriculoLattes" placeholder="" required></br>
                                        <label for="Instituição">Instituição:</label></br>
                                        <input type="text" id="Instituição" name="instituicao" placeholder="" required></br>
                                        Sexo:</br>
                                            <label for="feminino">Feminino</label>
                                            <input type="radio" id="Feminino" name="sexo" value="feminino"></br></br>
                                             <label for="masculino">Masculino</label>
                                            <input type="radio" id="Masculino" name="sexo" value="masculino"></br></br>                                           
                                    
                                        <label for="Telefone">Telefone:</label></br>
                                        <input type="number" id="Telefone" name="telefone" placeholder=""></br>
                                    </div>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button4">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Remover Evento -->
            <div id="modal5" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1 style="text-align: center;">Removendo Autor</h1></br>
                                    <h2 style="text-align: center;">Aviso:</h2></br>
                                    <h3 style="text-align: center;">Você realmente deseja apagar o Autor?</h3></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" id="cancel-button5">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dentro-bloco" >
                <h3>Gerenciar Autores</h3>
            </div>    
                
            <div class="bt-container">
                <button id = "btn2" name="btn2">Adicionar novo autor</button> 
            </div>      
                
            <div class="container_table"> 
               <!--Caixa inteira...-->
                <!--MENU-->

                <div style="padding-top: 70px;padding-bottom: 90px;">
                    <div>
                        <div class="itens_menu_esq"><a href="google.com">Gerenciar Organizadores</a></div>  
                        <div class="itens_menu_esq"><a href="google.com">Gerenciar Eventos</a></div> 
                        <div class="itens_menu_esq"><a href="google.com">Gerenciar Autores</a></div>   
                        <div class="itens_menu_esq"><a href="google.com">Gerenciar Artigos</a></div>
                    </div>
                </div>
                    
                <table>
                    <thead>
                        <tr>
                            <th>Nome do Autor</th>
                            <th>Instituição</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        

                        <?php foreach ($lista_autores as $linha): ?> 
                            
                        <tr>
                            <td><?= $linha->Nome ?></td>
                            <td><?= $linha->Telefone ?></td>
                            <td><?= $linha->Instituição ?></td>
                            <td>
                                <button type="button" id = "btn3">Verificar</button>
                                <button type="button" id = "btn4">Editar</button>
                                <button type="button" id = "btn5">Remover</button>
                            </td>
                        </tr>

                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
             
        </section>

        
        <script src="../../../js/jquery-3.6.0.min.js"></script> 
        <script>
            $(document).ready(function(){
                $("#btn1").click(function(){
                    $("#modal1").show();
                });              
                $("#cancel-button1").click(function(){
                    $("#modal1").hide();
                });
                $("#btn2").click(function(){
                    $("#modal2").show();
                });              
                $("#cancel-button2").click(function(){
                    $("#modal2").hide();
                });
                $("#btn3").click(function(){
                    $("#modal3").show();
                });              
                $("#cancel-button3").click(function(){
                    $("#modal3").hide();
                });
                $("#btn4").click(function(){
                    $("#modal4").show();
                });              
                $("#cancel-button4").click(function(){
                    $("#modal4").hide();
                });
                $("#btn5").click(function(){
                    $("#modal5").show();
                });              
                $("#cancel-button5").click(function(){
                    $("#modal5").hide();
                });
            });        
        </script>

        <footer>
            <div class="wrapper">
                <div class="company-footer">
                    <img src="../../../img/logo.png" style="width: 200px; height: 120px;">
                    <div class="text">   
                        <h2>BCD © 2023 | All rights reserved.</h2>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>