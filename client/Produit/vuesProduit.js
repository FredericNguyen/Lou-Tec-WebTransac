let montrerFormEnreg = () => {
    let form = `
    <!-- Modal pour enregistrer produit -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrer produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="duree" class="form-label">Durée</label>
                            <input type="numeric" class="form-control is-valid" id="duree" name="duree" required>
                        </div>
                        <div class="col-md-12">
                            <label for="res" class="form-label">Réalisateur</label>
                            <input type="text" class="form-control is-valid" id="res" name="res" required>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="pochette" class="form-label">Pochette</label>
                            <input type="file"  class="form-control is-valid" id="pochette" name="pochette">
                        </div> -->
                        <br/>
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onClick="requeteEnregistrer();">Enregistrer</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal pour enregistrer produit -->
    `;
    document.getElementById('contenu').innerHTML = form;
    $('#enregModal').modal('show');
}


let remplirCard = (unProduit)=> {
    let rep = ' <div class="row">';
    rep +='<div class="card card-perso">';
                 rep +=' <div class="card-body">';
                 rep +=' <h5 class="card-title">'+'Code: '+unProduit.idP+' '+unProduit.nom+'</h5>';
                 rep +=' <p class="card-text">Catégorie : '+unProduit.categorie+'</p>';
                 rep +=' <p class="card-text">Prix : '+unProduit.prix+'$</p>';
				 rep +=' <p class="card-text">Quantité Inventaire : '+unProduit.qt_inventaire+'$</p>';
				 rep +=' <p class="card-text">Description : '+unProduit.description+'$</p>';
                 rep +=' </div>';
                 rep +=' </div>';
                 rep +=' </div>';
             
        return rep;
}


let listerProduits = (listeProduits) => {
    let contenu = `<div class="row row-cols-4">`;
    for (let unProduit of listeProduits){
            contenu+=remplirCard(unProduit);
    } 
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;
}

let afficherMessage = (msg) => {
    document.getElementById('msg').innerHTML = msg;
    //setTimeout(() => { $('#msg').html(""); }, 5000);
    setTimeout(() => {
        document.getElementById('msg').innerHTML = "";
        document.getElementById('formEnreg').reset();

    }, 5000);
}

let afficherMessageSupprimer = (msg) => {
    document.getElementById('msg').innerHTML = msg;
    //setTimeout(() => { $('#msg').html(""); }, 5000);
    setTimeout(() => {
        document.getElementById('msg').innerHTML = "";
        document.getElementById('formEnlever').reset();

    }, 5000);
}

let montrerVue = (action, xmlReponse) => {

    switch(action){
        case "enregistrer"  :
        case "modifier"     :
        case "enlever"      :
            afficherMessage(xmlReponse.getElementsByTagName('msg')[0].firstChild.nodeValue);
        break;
        case "lister"       :
            if(xmlReponse.firstChild.nodeName == 'message'){
                afficherMessage(xmlReponse.getElementsByTagName('msg')[0].firstChild.nodeValue);
            } else {
                listerProduits(xmlReponse);
            }
    }
}

const loadPage = () => {
	localStorage.clear();
	document.getElementsByClassName('container')[0].innerHTML = "";
	listerAvecCards();
}

const montrerMessage = (idElem, msg) => {
	console.log(msg)
    document.getElementById(idElem).innerHTML = msg;
    setInterval(() => {
        document.getElementById(idElem).innerHTML = "";
    }, 4000);
	chargerProduitsJSON();
}

const montrerFormModifierProduit = (leProduit) => {
	document.getElementById('idForms').innerHTML = modalModifierProduits(leProduit);
	mettreDonneesDansFormModifierProduit(leProduit);
	const modalModifierProduit = new bootstrap.Modal('#modalModiferProduit', {
   });
   modalModifierProduit.show();
}

const montrerFormEnleverProduit = (leProduit) => {
	document.getElementById('idForms').innerHTML = modalEnleverProduits(leProduit);
	const modalEnleverProduit = new bootstrap.Modal('#modalEnleverProduit', {
   });
   modalEnleverProduit.show();
}

const modalModifierProduits = () => {
   return `
	   <!-- Modal enregistrer produit -->
   <div class="modal fade" id="modalModiferProduit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'un produit</h1>
				   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			   </div>
			   <div class="modal-body">
				   <!-- Formulaire enregistrer produit -->
				   <form id="formEnregProduit" class="row">
						<div class="col-md-3">
							<label for="num" class="form-label">Numéro</label>
							<input type="text" class="form-control is-valid" id="mdnum" name="mdnum" readonly>
						</div>
					   <div class="col-md-6">
						   <label for="nom" class="form-label">Titre</label>
						   <input type="text" class="form-control is-valid" id="mdnom" name="mdnom" required>
					   </div>
					   <div class="col-md-3">
						   <label for="annee" class="form-label">Annee de diffusion</label>
						   <input type="number" class="form-control is-valid" id="mdannee" name="mdannee" required>
					   </div>
					   <div class="col-md-3">
						   <label for="runtime" class="form-label">Durée du produit</label>
						   <input type="number" class="form-control is-valid" id="mdruntime" name="mdruntime" required>
					   </div>
					   <div class="col-md-12">
						   <label for="genres" class="form-label">Genres</label>
						   <input type="text" class="form-control is-valid" id="mdgenres" name="mdgenres" required>
					   </div>
					   <div class="col-md-6">
						   <label for="director" class="form-label">Directeur</label>
						   <input type="text" class="form-control is-valid" id="mddirector" name="mddirector" required>
					   </div>
					   <div class="col-md-12">
						   <label for="actors" class="form-label">Acteurs</label>
						   <input type="text" class="form-control is-valid" id="mdactors" name="mdactors" required>
					   </div>
					   <div class="col-md-12">
						   <label for="plot" class="form-label">Plot</label>
						   <input type="text" class="form-control is-valid" id="mdplot" name="mdplot" required>
					   </div>
					   <div class="col-md-12">
                            <label for="posterUrl" class="form-label">Poster Link</label>
                            <input type="text" class="form-control is-valid" id="posterUrl" name="posterUrl" required>
                        </div>
					   <div class="col-12 btn-enreg">
					   <br>
						   <button class="btn btn-primary" type="button" onClick="modifierProduit();">Modifier</button>
						   <button class="btn btn-danger" type="reset">Vider</button>
						   <span id="msge"></span>
					   </div>
				   </form>
				   <!-- Fin du formulaire enregistrer produit -->
			   </div>
		   </div>
	   </div>
   </div>
   <!-- Fin modal enregistrer produit -->
   `;
}


const modalEnleverProduits = (numId) => {
	return `<div class="modal fade" id = "modalEnleverProduit" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Confirmer effacement</h5>
		  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <p>Voulez-vous vraiment supprimer ce produit?</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-primary" onClick='supprimerProduit(${numId});'>Confirmer</button>
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
		  <span id="msge"></span>
		</div>
	  </div>
	</div>
  </div>`;
}

const editerProduit = (numProduit) => {
   let leProduit = listeProduits.movies.find(unProduit => {
	   return unProduit.id == numProduit;
   });
   montrerFormModifierProduit(leProduit);
}

const formatProduitTexte = (texte) => {
	MAX_LENGTH = 230;
	if (texte.length > MAX_LENGTH) {
		let resultat = texte.substring(0, MAX_LENGTH)
		return resultat+="..."
	}
	return texte
}

const creerCard = (unProduit) => {
	const webLink = "https";
	if (unProduit.posterUrl.substring(0, webLink.length) != webLink) {
		unProduit.posterUrl = `serveur/pochettes/${unProduit.posterUrl}`;
	}
	return `
	<div class="card-group">
		<div class="card mb-3" >
			<div class="row no-gutters">
				<div class="col-md-4">
					<img class="card-img-top" src="${unProduit.posterUrl}" alt="Card image cap">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<div class="div-icones">
							<i class="fa fa-pencil-square fa-lg edit-perso margin-icones" aria-hidden="true" onClick='editerProduit(${unProduit.id});'></i>
							<i class="fa fa-minus-square fa-lg delete-perso margin-icones" aria-hidden="true" onClick='montrerFormEnleverProduit(${unProduit.id});'></i>
						</div>
						<h5 class="card-title">${unProduit.id} | ${unProduit.title}</h5>
						<div class="card-text">${unProduit.director} | ${unProduit.actors.toString()}</div>
						<p class="card-text">${unProduit.year} | ${unProduit.runtime} mins | ${unProduit.genres.toString()}</p>
						<p class="card-text">${formatProduitTexte(unProduit.plot)}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	`;
}

const construireNav = () => {
	let navigation = `
		<nav class="navbar navbar-light bg-light justify-content-between" >
			<i class="fa fa-plus-square fa-2x add-perso margin-icones" aria-hidden="true" onClick="montrerFormEnregProduit();"></i><br/>
		</nav>
	`;
	return navigation;
}


const listerAvecCards = () => {
	let resultat = `<div class="row">`;
	for(let i=0; i<(listeProduits.length); i++){
        resultat += creerCard(listerProduits[i]);
	}
	resultat += "</div>";
	document.getElementsByClassName('container')[0].innerHTML = construireNav(pageNb, currentViewProduits.length);
	document.getElementsByClassName('container')[0].innerHTML += resultat;
}
  
const mettreDonneesDansFormModifierProduit = (unProduit) => {
	document.getElementById('mdnum').value = unProduit.id;
	document.getElementById('mdnom').value = unProduit.title;
	document.getElementById('mddirector').value = unProduit.director;
	document.getElementById('mdannee').value = unProduit.year;
	document.getElementById('mdruntime').value = unProduit.runtime;
	document.getElementById('mdgenres').value = unProduit.genres;
	document.getElementById('mdactors').value = unProduit.actors;
	document.getElementById('mdplot').value = unProduit.plot;
	document.getElementById('posterUrl').value = unProduit.posterUrl;
  };
