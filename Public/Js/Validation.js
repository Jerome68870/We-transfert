let mailExpediteur = document.getElementById("mailExpediteur").value;
let mailmailDestinataire = document.getElementById("mailDestinataire").value;
const input = document.getElementById("enregistrer");

input.addEventListener("click",Enregistrer);

function Enregistrer(event)
{
	const fichiers = document.getElementById("fichiers").files;
	const message = document.getElementById("message");
	message.innerText = "";

	if(fichiers.length === 0 )
	{
		message.innerText = "selectionner un fichier";
		return ;
	}
	ValidationMail(mailExpediteur);
	ValidationMail(mailDestinataire);

}

function ValidationMail(mail)
{
	let regex = "^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" ;

	if (mail.match(regex) == [])
	{
		alert("Adresse mail non valide");
	}

}




