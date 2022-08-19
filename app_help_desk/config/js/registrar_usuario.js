
function verificar_email() {
    
    var email = $("#email");

}

function verificar_senha() {
    
    var senha = $("#senha");
    console.log("tste")

}

function confirma_senha() {
    
    var confirma_senha = $("#confirma_senha").val();
    var senha = $("#senha").val();
    
    if (confirma_senha != senha) {

        $("#confirma_senha").after("<div class='text-danger' >Senha Incorreta</div>")
    }
}