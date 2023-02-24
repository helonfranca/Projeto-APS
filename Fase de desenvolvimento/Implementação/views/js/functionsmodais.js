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