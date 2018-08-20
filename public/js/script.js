function couleur(champ, erreur){
	if (erreur) {
		champ.style.borderColor = "#FA5858";
		champ.style.boxShadow = "1px 1px 12px #FA5858";
	}
	else{
		champ.style.borderColor = "#5cb85c";
		champ.style.boxShadow = "1px 1px 12px #5CB85C";
	}
}

function checkPwd(champ){
	if (champ.value.length < 4) {
		couleur(champ, true);
		return false
	}
	else{
		couleur(champ, false);
		return true;
	}
}

function checkEmail(champ){
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$/;
	if (regex.test(champ.value)) {
		couleur(champ, false);
	}
	else{
		couleur(champ, true);
	}
}

function checkPseudo(champ){
	if (champ.value.length < 2) {
		couleur(champ, true);
		return false
	}
	else{
		couleur(champ, false);
		return true;
	}
}