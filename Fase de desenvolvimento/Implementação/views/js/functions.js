

function setAutorIdRemover(id_autor) {
    document.getElementById("id_autor_remover").value = id_autor;
}

async function visUsuario(id) {
    //console.log("Acessou: " + id);
    const dados = await fetch('controller/BuscaAutorController.php?id=' + id);
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
    //console.log("Acessou: " + id);
    const dados = await fetch('controller/BuscaAutorController.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['status']){
        document.getElementById("id").value = resposta['dados'].Autor_ID;
        document.getElementById("editnome").value = resposta['dados'].Nome;
        document.getElementById("editTelefone").value = resposta['dados'].Telefone;
        document.getElementById("editInstituicaoAutor").value = resposta['dados'].Instituição;
        document.getElementById("editCurriculoAutor").value = resposta['dados'].CurriculoLattes;
        document.getElementById("editDataNasc").value = resposta['dados'].DataDeNascimento;


    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }


    

}

