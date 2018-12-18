function loginaction(){
	var login = document.getElementById("login").value;
	var password = document.getElementById("password").value;
	$.ajax({
		type:'post',
		url:'loginaction.php',
		data:{ 'login': login, 'password':password },
		success: function(response){
			if(response == "SUCCESS"){
				window.location.href = "google.com";
			} else {
				var label = document.getElementById("response");
				label.innerHTML = "Usuário ou Senha Inválidos";
			}
		},
		error: function(){
			alert('Erro de rede, tente novamente');
		}
	});

}