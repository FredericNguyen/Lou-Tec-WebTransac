let listeProduits = [];

let validerFormEnreg = () => {
    etat = true;
    let mdp = document.getElementById('mdp').value;
    let mdpc = document.getElementById('mdpc').value;
    if(mdp !== mdpc){
        etat = false;
        msgpass = document.getElementById('msgPass');
        msgpass.innerHTML =  "<b style='color:red'>Les deux mots de passe de sont pas egaux</b>"
        setInterval(() => {
             document.getElementById('msgPass').innerHTML = ""; //on supprime le message apres 3 secondes
         }, 4000);   
    }
    return etat;
} 

const afficherFormModalAjouterMembre = () =>{
    $('#enregModal').modal('show');
}
const afficherFormModalConnecterMembre = () => {
    $('#modalConnexion').modal('show');
}
let montrerToast = (msg) =>{
	if(msg.length > 0){
		let textToast = document.getElementById("textToast");
		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
		var toastList = toastElList.map(function (toastEl) {
			return new bootstrap.Toast(toastEl)
		})
		//textToast.innerHTML = msg;
        document.getElementById("msgToast").innerHTML = msg;
		toastList[0].show();
	}
}
