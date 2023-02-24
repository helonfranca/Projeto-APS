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
                                        <label for="sexo">Sexo:</label></br>
                                        <select name="select">
                                            <option value="valor1">Masculino</option>
                                            <option value="valor2" selected>Feminino</option>
                                            <option value="valor3">Prefiro não dizer</option>
                                        </select></br></br>
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

          
             <!-- Modal Verficar Autor -->
            <div id="modal3" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <dl class="row">
                            <dt><button type="button" class="cancel-button3" data-modal-id="modal3">Fechar</button></dt></br></br>
                            <dt class="col-sm-3">Nome: <span id="NomeAutor"></span></dt>
                            <dt class="col-sm-3">Telefone:  <span id="TelefoneAutor"></span></dt>
                            <dt class="col-sm-3">Instituição: <span id="InstituicaoAutor"></span></dt>
                            <dt class="col-sm-3">Curriculo: <span id="CurriculoAutor"></dt>
                            <dt class="col-sm-3">Curriculo: <span id="DataNasc"></span></dt>
                            <dt class="col-sm-3">Curriculo: <span id="Sexo"></span></dt>
                           
                        </dl>
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
                                        <label for="sexo">Sexo:</label></br>
                                        <select name="select">
                                            <option value="valor1">Masculino</option>
                                            <option value="valor2" selected>Feminino</option>
                                            <option value="valor3">Prefiro não dizer</option>
                                        </select></br></br>
                                        <label for="Telefone">Telefone:</label></br>
                                        <input type="number" id="Telefone" name="telefone" placeholder=""></br>
                                    </div>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit" >Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="cancel-button4" data-modal-id="modal4">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Remover Autor -->
            <div id="modal5" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="../../../../controller/DeletarAutorController.php">
                                <div class="dentro-form">
                                    <h1 style="text-align: center;">Removendo Autor</h1></br>
                                    <h2 style="text-align: center;">Aviso:</h2></br>
                                    <h3 style="text-align: center;">Você realmente deseja apagar o Autor?</h3></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="cancel-button5" data-modal-id="modal5">Cancelar</button>
                                    </div>
                                    <input type="hidden" name="id_autor" id="id_autor_remover" value="">
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
                        <?php if(isset($lista_autores) && !empty($lista_autores)):
                            foreach ($lista_autores as $linha): ?>                        
                                <tr>
                                    <td><?= $linha->Nome ?></td>
                                    <td><?= $linha->Instituição ?></td>
                                    <td><?= $linha->Telefone ?></td>
                                    <td>
                                        <button type="button" data-modal-id="modal3" class="btn3">Verificar</button>
                                        <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                        <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5" onclick="setAutorIdRemover(<?= $linha->Autor_ID ?>)">Remover</button>                           
                                    </td>
                                </tr>
                            <?php endforeach;
                        endif?>
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
                $(".btn3").click(function(){
                var modalId = $(this).data("modal-id"); // obtem o ID do modal a partir do botão
                $("#"+modalId).show(); // mostra o modal correspondente
                });

                $(".btn4").click(function(){
                var modalId = $(this).data("modal-id"); 
                $("#"+modalId).show();
                });

                $(".btn5").click(function(){
                var modalId = $(this).data("modal-id"); 
                $("#"+modalId).show(); 
                });

                $(".cancel-button3").click(function(){
                var modalId = $(this).data("modal-id"); // obtem o ID do modal a partir do botão
                $("#"+modalId).hide(); // vai fechar o modal correspondente
                });
                
                $(".cancel-button4").click(function(){
                var modalId = $(this).data("modal-id"); 
                $("#"+modalId).hide(); 
                });

                $(".cancel-button5").click(function(){
                var modalId = $(this).data("modal-id"); 
                $("#"+modalId).hide(); 
                });
            });

        </script>

        <script>
            function setAutorIdRemover(id_autor) {
                document.getElementById("id_autor_remover").value = id_autor;
            }
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