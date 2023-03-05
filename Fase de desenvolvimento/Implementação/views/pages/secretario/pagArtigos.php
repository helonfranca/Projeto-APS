<?php

//criando rotas

session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != "2") {
    header("Location: /");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="views/css/style.css">
        <link rel="stylesheet" href="views/css/stylecrud.css">
        <link rel="stylesheet" href="views/css/stlylemodal.css">
        
        <title>Biblioteca Científica Digital</title>
    </head>

    <body>
        <header>
            <div class = "container">
                <div class = "logo"><a href="indexSecretário.html"><img src="views/img/logo.png" style="width: 200px; height: 120px;"></a></div>
                <div class = "menu">
                    <nav>
                        <a href="IndexSecretário.html#Sobre">Sobre</a>
                        <a href="IndexSecretário.html#Colaborador">Quero ser colaborador</a>
                        <a href="IndexSecretário.html#Artigo">Submeta seu artigo</a>
                        <a href="eventos.html">Eventos</a>
                        <a href="/home">Menu</a>
                    </nav>
                </div>

                <div class="login">
                    <?php echo '<p>Bem-vindo, ' . $_SESSION['nome_usuario'] . '!</p>'; ?>
                    </br>
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

            <!-- Modal Adicionar Artigo -->
            <div id="modal2" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Adicionar novo Artigo</h1></br>
                                    <div class= "form-dados">
                                        <label for="titulo">Título:</label></br>
                                        <input type="text" id="titulo" name="titulo" placeholder="" required></br>
                                        <label for="datapub">Data de publicação:</label></br>
                                        <input type="date" id="datapub" name="datapub" placeholder="" required></br>
                                        <label for="autores">Autores:</label></br>
                                        <input type="text" id="autores" name="autores" placeholder="" required></br>
                                        <label for="email">Email:</label></br>
                                        <input type="email" id="email" name="email" placeholder="" required></br>
                                        <label for="arquivopdf">Arquivo PDF:</label></br>
                                        <input type="file" id="arquivopdf" name="arquivopdf" placeholder="" accept=".pdf" required></br>
                                        <label for="areaestudo">Área de Estudo:</label></br>
                                        <input type="text" id="areaestudo" name="areaestudo" placeholder="" required></br>
                                        <label for="resumo">Resumo:</label></br>
                                        <input type="text" id="resumo" name="resumo" placeholder=""></br>
                                        <label for="abstract">Abstract:</label></br>
                                        <input type="text" id="abstract" name="abstract" placeholder=""></br>
                                        <label for="linguagem">Linguagem:</label></br>
                                        <input type="text" id="linguagem" name="linguagem" placeholder=""></br>
                                        <label for="palavras">Palavras:</label></br>
                                        <input type="text" id="palavras" name="palavras" placeholder=""></br>                                       
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

            <!-- Modal Verificar Evento -->
            <div id="modal3" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Dados Artigo</h1></br>
                                    <div class= "form-dados">
                                        <label for="nome">Nome do Evento:</label></br>
                                        <input type="nome" id="nome" name="nome" placeholder="" required></br>
                                        <label for="ano">Ano:</label></br>
                                        <input type="number" id="ano" name="ano" placeholder="" maxlength="4" required></br>
                                        <label for="organizador">Organizador:</label></br>
                                        <input type="organizador" id="organizador" name="organizador" placeholder="" required></br>
                                        <label for="ano">Tipo:</label></br>
                                        <input type="text" id="tipo" name="tipo" placeholder="" required></br>
                                        <label for="link">Link do Evento:</label></br>
                                        <input type="link" id="link" name="link" placeholder="" required></br>
                                        <label for="descrição">Descrição:</label></br>
                                        <input type="text" id="descrição" name="descrição" placeholder="" required></br>
                                        <label for="ano">Trilha:</label></br>
                                        <input type="text" id="ano" name="trilha" placeholder=""></br>
                                    </div>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                    <dt><button type="button" class="cancel-button3" data-modal-id="modal3">Fechar</button></dt>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Editar Artigo -->
            <div id="modal4" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Editar Artigo</h1></br>
                                    <div class= "form-dados">
                                        <label for="titulo">Título:</label></br>
                                        <input type="text" id="titulo" name="titulo" placeholder="" required></br>
                                        <label for="datapub">Data de publicação:</label></br>
                                        <input type="date" id="datapub" name="datapub" placeholder="" required></br>
                                        <label for="autores">Autores:</label></br>
                                        <input type="text" id="autores" name="autores" placeholder="" required></br>
                                        <label for="email">Email:</label></br>
                                        <input type="email" id="email" name="email" placeholder="" required></br>
                                        <label for="arquivopdf">Arquivo PDF:</label></br>
                                        <input type="file" id="arquivopdf" name="arquivopdf" placeholder="" accept=".pdf" required></br>
                                        <label for="areaestudo">Área de Estudo:</label></br>
                                        <input type="text" id="areaestudo" name="areaestudo" placeholder="" required></br>
                                        <label for="resumo">Resumo:</label></br>
                                        <input type="text" id="resumo" name="resumo" placeholder=""></br>
                                        <label for="abstract">Abstract:</label></br>
                                        <input type="text" id="abstract" name="abstract" placeholder=""></br>
                                        <label for="linguagem">Linguagem:</label></br>
                                        <input type="text" id="linguagem" name="linguagem" placeholder=""></br>
                                        <label for="palavras">Palavras:</label></br>
                                        <input type="text" id="palavras" name="palavras" placeholder=""></br>                                       
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

            <!-- Modal Remover Evento -->
            <div id="modal5" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1 style="text-align: center;">Removendo Evento</h1></br>
                                    <h2 style="text-align: center;">Aviso:</h2></br>
                                    <h3 style="text-align: center;">Você realmente deseja apagar o evento?</h3></br>
                                    <div style = "text-align:center; margin-left: auto; margin-right: auto;">
                                        <button type="submit">Confirmar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="cancel-button5" data-modal-id="modal5">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dentro-bloco" >
                <h3>Gerenciar Artigos</h3>
            </div>    
                
            <div class="bt-container">
                <button id = "btn2">Adicionar novo artigo</button> 
            </div>      
                
            <div class="container_table"> 
               <!--Caixa inteira...-->
                <!--MENU-->

                <div style="padding-top: 70px;padding-bottom: 90px;">
                    <div>
                        <div class="itens_menu_esq"><a style="color: white;" href="/organizadores">Gerenciar Organizadores</a></div>  
                        <div class="itens_menu_esq"><a style="color: white;" href="/eventos">Gerenciar Eventos</a></div> 
                        <div class="itens_menu_esq"><a style="color: white;" href="/autores">Gerenciar Autores</a></div>   
                        <div class="itens_menu_esq"><a style="color: white;" href="/artigos">Gerenciar Artigos</a></div>
                    </div>
                </div>
                    
                <table>
                    <thead>
                        <tr>
                            <th>Titulo do artigo</th>
                            <th>Data de Publicação</th>
                            <th>Autor(es)</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mapeamento sistemático em internet das coisas na área da saúde</td>
                            <td>20/20/2020</td>
                            <td>Helon, Pablo</td>
                            <td>
                                <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                                            
                                <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Análise de vulnerabilidade e refatoração de code smells em códigos c#: um estudo de caso.</td>
                            <td>20/20/2020</td>
                            <td>Vanessa, Pablo</td>
                            <td>
                                <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                                            
                                <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>
                            </td>
                        </tr>

                        <tr>
                            <td>A Inteligência artificial e os sistemas críticos, uma pesquisa exploratória</td>
                            <td>20/20/2020</td>
                            <td>Vanessa</td>
                            <td>
                                <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                                    
                                <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Mapeamento sistemático em computação quântica </td>
                            <td>20/20/2020</td>
                            <td>Thiago</td>
                            <td>
                                <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                                    
                                <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Tecnologia e educação: como as inovações podem revolucionar o ensino</td>
                            <td>20/20/2020</td>
                            <td>Helon</td>
                            <td>
                                <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                            
                                <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
             
        </section>

        <script src="views/js/functions.js"></script> 
        <script src="views/js/jquery-3.6.0.min.js"></script> 
        <script src="views/js/functionsmodais.js"></script>

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