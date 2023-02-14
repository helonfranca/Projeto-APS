<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block; }
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Pessoa</legend>
        <form method="post" action="../controller/GerenciamentoAutor.php">
            
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" type="text" />
            <label for="Telefone">Tel:</label>
            <input id="telefone" name="telefone" type="number" />
            
            <label for="Sexo">Sexo:</label>
            <input id="sexo" name="sexo" type="text" />
            <label for="instituicao">Instituição:</label>
            <input id="instituicao" name="instituicao"  type="text" />
            
            <label for="curriculo">Curriculo-lattes:</label>
            <input id="curriculo" name="CurriculoLattes"  type="text" />
            <label for="DataDeNascimento">Data Nascimento:</label>
            <input id="DataDeNascimento" name="DataDeNascimento" type="date" />
            
            <button type="submit">Salvar</button>
        </form>

        <form method="post" action="../controller/verificarAutor.php">
            <div>Lista de Autores</div>
            <button type="submit">Exibir lista</button>


<       </form>
    </fieldset>

    
</body>
</html>