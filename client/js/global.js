const validerFormEnreg = () => {
    let etat = true;
    let mdp = document.getElementById('mdp').value;
    let mdpc = docuemt.getElementById('mdpc').value;
    if(mdp != mdpc){
        etat = false;
        document.getElementById('msgPass').innerHTML = "Les deux mots de passe de sont pas egaux";
        setInterval(() => {
            document.getElementById('msgPass').innerHTML = ""; //on supprime le message apres 3 secondes
        }, 3000);
    }
} 

const afficherFormModalAjouterMembre = () =>{
    $('#enregModal').modal('show');
}
const afficherFormModalConnecterMembre = () => {
    $('#modalConnexion').modal('show');
}
