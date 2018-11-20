// Acesso para administrador da plataforma

var botaoAcessar = document.querySelector("#entrar");

botaoAcessar.addEventListener("click", verificacao);

function verificacao(event){

	event.preventDefault(); // Utiliza essa funcao para tirar o comportamento padrao do html, de recarregar a pagina

	var login = document.querySelector("#form-login"); 

	var dadosUsuario = obtemInfo(login);

	var erros = validaUsuario(dadosUsuario);

	if (erros.length > 0) {
		alert("Usuario e/ou senha estão incorretos");
	}
	else if(erros.length == 0){
		window.location.href = "<?php echo site_url ('controller/login/bemvindo)?>";
	}

	login.reset();
}

function obtemInfo(login){

	// Cria um objeto que tem as mesmas características
	var dadosUsuario = {
		nome: login.usuario_acesso.value,
		senha: login.senha_acesso.value
	}

	return dadosUsuario;
}

function validaUsuario(dadosUsuario){

	// Cria um vetor de erros
	var erros = [];

	var usuario = "LigaDesportiva";
	var senha = "Liga123456";

	if(usuario.localeCompare(dadosUsuario.nome)){
		erros.push("1");
	}

	if(senha.localeCompare(dadosUsuario.senha)){
		erros.push("2");
	}	

	return erros;
}