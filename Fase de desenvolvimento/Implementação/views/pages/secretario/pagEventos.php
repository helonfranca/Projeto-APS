<?php
session_start();

require_once("controller/controllerOrganizador/ListarOrganizadoresController.php");
require_once("controller/controllerEvento/ListarEventosController.php");

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

                <div class= "login">
                    <?php echo '<p>Bem-vindo, ' . $_SESSION['nome_usuario'] . '!</p>';?>
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
                            <form method="post" action="/logout">
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

            <!-- Modal Adicionar Evento -->
            <div id="modal2" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="/evento/form/save">
                                <div class="dentro-form">
                                    <h1>Adicionar novo evento</h1></br>
                                    <div class= "form-dados">
                                        <label for="nome">Nome do Evento:</label></br>
                                        <input type="nome" id="nome" name="nome" placeholder="" required></br>
                                        <label for="ano">Ano:</label></br>
                                        <input type="number" id="ano" name="ano" placeholder="" maxlength="4" required></br></br>
                                        <label for="organizadores">Organizadores:</label></br>
                                        <div class="multiselect" style="display: inline-block;" >
                                            <div class="selectBox" onclick="showCheckboxes()">
                                                <select>
                                                    <option>Selecione os organizadores:</option>
                                                </select>
                                                <div class="overSelect"></div>
                                            </div>
                                            <div id="checkboxes">
                                            <?php if(isset($lista_organizadores) && !empty($lista_organizadores)): ?>
                                                <?php foreach ($lista_organizadores as $linha): ?>
                                                    <label for="<?= $linha->Organizador_ID ?>">
                                                        <input type="checkbox" value="<?= $linha->Organizador_ID ?>" name="organizador[]"/><?= $linha->Nome ?>
                                                    </label>
                                                <?php endforeach;
                                            endif?>
                                            </div>
                                        </div></br></br>
                                        <label for="ano">Tipo:</label></br>
                                        <input type="text" id="tipo" name="tipo" placeholder="" required></br>
                                        <label for="areadeestudo">Área de Estudo:</label></br>
                                        <input type="text" id="areadeestudo" name="areadeestudo" placeholder="" required></br>
                                        <label for="link">Link do Evento:</label></br>
                                        <input type="link" id="link" name="link" placeholder="" required></br>
                                        <label for="descricao">Descrição:</label></br>
                                        <input type="text" id="descricao" name="descricao" placeholder="" required></br>
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
                                <dl class="row" style=" display: flex; align-items: center; flex-direction: column;">
                                    <dt class="col-sm-3">Nome: <span id="NomeOrganizador"></span></dt></br>
                                    <dt class="col-sm-3">Telefone:  <span id="TelefoneOrganizador"></span></dt></br>
                                    <dt class="col-sm-3">Instituição: <span id="InstituicaoOrganizador"></span></dt></br>
                                    <dt class="col-sm-3">Curriculo: <span id="CurriculoOrganizador"></dt></br>
                                    <dt class="col-sm-3">Data de Nascimento: <span id="DataNasc"></span></dt></br>
                                    <dt class="col-sm-3">CPF: <span id="cpf"></span></dt></br>
                                    <dt class="col-sm-3">Sexo: <span id="Sexo"></span></dt></br>
                                    <dt><button type="button" class="cancel-button3" data-modal-id="modal3">Fechar</button></dt>
                                </dl>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Editar Evento -->
            <div id="modal4" style="display: none;">
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="fora-form">
                            <form method="post" action="">
                                <div class="dentro-form">
                                    <h1>Editar Evento</h1></br>
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
                <h3>Gerenciar Eventos</h3>
            </div>    
                
            <div class="bt-container">
                <button id = "btn2" name="btn2">Adicionar novo evento</button> 
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
                            <th>Nome do Evento</th>
                            <th>Ano</th>
                            <th>Organizador(es)</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($meus_eventos) && !empty($meus_eventos)):
                            foreach ($meus_eventos as $linha): ?>                        
                                <tr>
                                    <td><?= $linha->Nome?></td>
                                    <td><?= $linha->Ano?></td>
                                    <td><?= $linha->organizadores?></td>

                                    <td>
                                        <button type="button" data-modal-id="modal3" class="btn3"> Verificar</button>                                         
                                        
                                        <button type="button" data-modal-id="modal4" class="btn4">Editar</button>
                                            
                                        <button type="button" data-modal-id="modal5" class="btn5" data-target="#modal5">Remover</button>                           
                                    </td>
                                </tr>
                            <?php endforeach;
                        endif?>
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