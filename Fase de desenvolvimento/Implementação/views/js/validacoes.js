function mascaraTelefone(telefone) {
    telefone.value = telefone.value.replace(/\D/g, ''); // remove tudo o que não é número
    telefone.value = telefone.value.slice(0, 11); // limita a entrada a 11 dígitos (XX-XXXXXXXXX)
    telefone.value = telefone.value.replace(/^(\d{2})(\d)/g, '($1) $2'); // adiciona parênteses em volta dos dois primeiros dígitos
    telefone.value = telefone.value.replace(/(\d{4,5})(\d)/, '$1-$2'); // adiciona um traço após os próximos quatro ou cinco dígitos
}

function mascaraCPF(cpf) {
    cpf.value = cpf.value.replace(/\D/g, ''); // remove tudo o que não é número
    cpf.value = cpf.value.slice(0, 11); // limita a entrada a 11 dígitos (XXXXXXXXXXX)
    cpf.value = cpf.value.replace(/(\d{3})(\d)/, '$1.$2'); // adiciona um ponto após os primeiros três dígitos
    cpf.value = cpf.value.replace(/(\d{3})(\d)/, '$1.$2'); // adiciona um ponto após os próximos três dígitos
    cpf.value = cpf.value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // adiciona um ponto e um traço após os próximos três e dois dígitos, respectivamente
}

function mostrarSenha() {
    
    var senhaInput = document.getElementById("senha");
    
    if (senhaInput.type === "password") {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
}


  
  
  
  
  