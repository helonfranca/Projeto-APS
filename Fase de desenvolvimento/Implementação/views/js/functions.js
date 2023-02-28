function setAutorIdRemover(id_autor) {
    document.getElementById("id_autor_remover").value = id_autor;
}

async function visUsuario(id) {
    //console.log("Acessou: " + id);
    const dados = await fetch('/autor/form/busca?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['status']){
        document.getElementById("NomeAutor").innerHTML = resposta['dados'].Nome;
        document.getElementById("TelefoneAutor").innerHTML = resposta['dados'].Telefone;
        document.getElementById("InstituicaoAutor").innerHTML = resposta['dados'].Instituição;
        document.getElementById("CurriculoAutor").innerHTML = resposta['dados'].CurriculoLattes;
        document.getElementById("DataNasc").innerHTML = resposta['dados'].DataDeNascimento;
        document.getElementById("Sexo").innerHTML = resposta['dados'].Sexo;


    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }


}

async function editUsuario(id) {

    const dados = await fetch('/autor/form/busca?id=' + id);
    const resposta = await dados.json();

    if (resposta['status']){
        document.getElementById("id").value = resposta['dados'].Autor_ID;
        document.getElementById("editNome").value = resposta['dados'].Nome;
        document.getElementById("editTelefone").value = resposta['dados'].Telefone;
        document.getElementById("editInstituicao").value = resposta['dados'].Instituição;
        document.getElementById("editCurriculoLattes").value = resposta['dados'].CurriculoLattes;
        document.getElementById("editDataDeNascimento").value = resposta['dados'].DataDeNascimento;
        var text = resposta['dados'].Sexo;

        var select = document.querySelector('#editsexo');
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].text == text) {
                select.selectedIndex = i;
                break;
            }
        }

    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }   
}

function setOrganizadorIdRemover(id_organizador) {
    document.getElementById("id_organizador_remover").value = id_organizador;
}

async function visOrganizador(id) {
    const dados = await fetch('/organizador/form/busca?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['status']){
        document.getElementById("NomeOrganizador").innerHTML = resposta['dados'].Nome;
        document.getElementById("TelefoneOrganizador").innerHTML = resposta['dados'].Telefone;
        document.getElementById("InstituicaoOrganizador").innerHTML = resposta['dados'].Instituição;
        document.getElementById("CurriculoOrganizador").innerHTML = resposta['dados'].CurriculoLattes;
        document.getElementById("DataNasc").innerHTML = resposta['dados'].DataDeNascimento;
        document.getElementById("cpf").innerHTML = resposta['dados'].Cpf;
        document.getElementById("Sexo").innerHTML = resposta['dados'].Sexo;

    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }


}

async function editOrganizador(id) {

    const dados = await fetch('/organizador/form/busca?id=' + id);
    const resposta = await dados.json();

    if (resposta['status']){
        document.getElementById("id").value = resposta['dados'].Organizador_ID;
        document.getElementById("editNome").value = resposta['dados'].Nome;
        document.getElementById("editTelefone").value = resposta['dados'].Telefone;
        document.getElementById("editInstituicao").value = resposta['dados'].Instituição;
        document.getElementById("editCurriculoLattes").value = resposta['dados'].CurriculoLattes;
        document.getElementById("editDataDeNascimento").value = resposta['dados'].DataDeNascimento;
        document.getElementById("editCpf").value = resposta['dados'].Cpf;
        var text = resposta['dados'].Sexo;

        var select = document.querySelector('#editsexo');
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].text == text) {
                select.selectedIndex = i;
                break;
            }
        }

    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }   
}

