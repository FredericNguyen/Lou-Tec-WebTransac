const construiteTableauMembreAffiche = (reponseServeur) => {
    let tabMembresAffiche = []; // le tableau a affiche
    let tabMembres = reponseServeur.listeMembres; //la liste des membres
    let tabConnexions = reponseServeur.infoEtatMembres; //liste info etat membres
    let etat;
    tabMembres.forEach((element) => {
        const found = tabConnexions.find((elemCon) => element.idm === elemCon.idm);
        if(found !== undefined){
            if(found.role !== "A"){ //il n'est pas administrateur
                let etat = found.statut === "A" ? "Actif" : "Inactif";
                tabMembresAffiche.push({idm:element.idm, nom:element.nom, //on ajoute un nouveau objet
                    prenom:element.prenom, sexe: element.sexe,datenaissance:element.datenaissance,
                    courriel: element.courriel,photo:element.photos,statut:etat});
            }  
        }   
    });
    return tabMembresAffiche;
}
function modifierStatutDansTableMembre(idMembre){
    let cell = document.getElementById(idMembre);
    let statut = cell.innerText;
    let nStatut = statut === "Actif" ? "Inactif" : "Actif";
    cell.textContent = nStatut;
    let icon = cell.nextSibling;
    if(nStatut ==="Inactif")
        icon.innerHTML = `<i onClick="activerDesactiverMembre(${idMembre});"class="fa fa-toggle-off"></i>`;
    else
        icon.innerHTML = `<i onClick="activerDesactiverMembre(${idMembre});"class="fa fa-toggle-on"></i>`;
    return nStatut.substring(0,1);
} 
let activerDesactiverMembre = (idMembre) =>{
    etat = modifierStatutDansTableMembre(idMembre); //modification du champs etat dans le tableau membre
    activeDesactiveMembre(idMembre,etat.substring(0,1));  //on lance la requete vers le serveur 
}
let construireRow = (obj) =>{
    idRow = obj.idm + "";
    idIcon = "ad"+obj.idm;
    result = "<tr>";
    result += `<th scope="row">${obj.idm}</th>`;
    //result +=  `<td>${obj.idm}</td>`
    result +=  `<td>${obj.nom}</td>`
    result +=  `<td>${obj.prenom}</td>` ;
	result +=  `<td>${obj.courriel}</td>` ;
	result +=  `<td>${obj.sexe}</td>`;
    result +=  `<td>${obj.datenaissance}</td>`;
    //result +=  `<td id= ${idRow}>${obj.statut}</td>`;    
    result +=  `<td id= ${idRow}>${obj.statut}</td>`;
    //result +=  `<td><img src=${obj.photo}></td>`;
    if(obj.statut === "Inactif")
        result +=  `<td><i onClick="activerDesactiverMembre(${obj.idm});"class="fa fa-toggle-off"></i></td>`;
    else
        result +=  `<td><i onClick="activerDesactiverMembre(${obj.idm});"class="fa fa-toggle-on"></i></td>`;
    //result +=  `<td><button onClick="activerDesactiverMembre(${obj.idm});"><i style='color:red' class="fa fa-power-off" aria-hidden="true"></i></button></td>`;
    result +=  "</tr>"; 
    return result;
}
let constructTable = (tableau) => {
   resultat =  `<table class="table table-success table-striped table-hover">
                    <caption style="color: red;font-weight:bolder;text-align:center;" align="top"><h2>Liste Des Membres</h2><caption>
                    <thead >
                        <tr class="table-dark"> 
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Courriel</th>
							<th scope="col">Sexe</th>
                            <th scope="col">Date Naissance</th>
                            <th scope="col">Statut</th>
							
                            <th scope="col"></th> 
                        </tr>
                    </thead>
                    <tbody>`;
    for (obj of tableau)
        resultat += construireRow(obj);
    resultat += `</tbody></table>`;
	$('#contenu').html(resultat);
}

function afficherListeMembres(reponseServeur){
	let tableauAafficher = construiteTableauMembreAffiche(reponseServeur);
    constructTable(tableauAafficher);
}
let adminVue=function(reponse){
	var action =reponse.action;
	switch(action){
        case "activer": 
        case "desactiver":
            afficheMessage(reponse.msg);
            break;
        case "lister_membres":
            afficherListeMembres(reponse);
	}
} 