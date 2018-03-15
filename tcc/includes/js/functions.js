

/* Função para Ocultar conteudo na tela CadastroPerfil */

function exibeDadosConta() {

	var x = document.getElementById("contribuicao-dinheiro").checked;

    if (x == true) {
        document.getElementById("dados-bancarios").style.display = "block";
    }
    else {
    	document.getElementById("dados-bancarios").style.display = "none";
    }  
     	
}
   