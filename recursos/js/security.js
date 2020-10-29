//Funcion validacion de formulario de registro


function validacion (){
	var nombre = document.getElementById("nombres").value;
	var apellidos = document.getElementById("apellidos").value;
	var usuario = document.getElementById("usuario").value;
	var email = document.getElementById("email").value;
	var clave = document.getElementById("clave").value;
	//Validaciones de nombre
	var caracteres = "<>¿?/{}[]¡!=";
	for (var i = 0; i <= caracteres.length; i++){
		for (char = 0; char <= nombre.length; char++){
			if (nombre.charAt(i) == caracteres.charAt(char)){
				alert("Nombre no valido");
				return false;
			}
		}
	}
	//Validaciones de apellidos
	var caracteres = "<>¿?/{}[]¡!=";
	for (var i = 0; i <= caracteres.length; i++){
		for (char = 0; char <= apellidos.length; char++){
			if (apellidos.charAt(i) == caracteres.charAt(char)){
				alert("Apellidos no valido");
				return false;
			}
		}
	}
	//Validaciones de usuario
	var caracteres = "<>¿?/{}[]¡!=";
	for (var i = 0; i <= caracteres.length; i++){
		for (char = 0; char <= usuario.length; char++){
			if (usuario.charAt(i) == caracteres.charAt(char)){
				alert("Usuario no valido");
				return false;
			}
		}
	}
	//Validacion de contraseña
	var espacios = false;
	var cont = 0;
	while (!espacios && (cont < clave.length)){
		if (clave.charAt(cont) == " "){
			espacios = true;
		}
		cont++;
	}
	//Retorna False, Evitando el envio de formulario
	if (espacios){
		alert("La contraseña no puede contener espacios en blanco");
		return false;
	}
	if (clave.length < 5){
		alert("Contraseña insegura");
		return false;
	}
	//Validacion de correo
	/*
	var re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	if(!re.exec(email)){
		alert('email no valido');
		return false;
	}else{
		alert('email valido');
		return true;
	}
	*/
	return true;
}