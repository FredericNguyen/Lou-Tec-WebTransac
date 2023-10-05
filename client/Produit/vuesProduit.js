
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
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control is-valid" id="titre" name="titre" required>
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
    let titre = unProduit.getElementsByTagName('titre')[0].firstChild.nodeValue;
    let res = unProduit.getElementsByTagName('res')[0].firstChild.nodeValue;
    let duree = unProduit.getElementsByTagName('duree')[0].firstChild.nodeValue;
    let rep =    ' <div class="col">';
    rep +='<div class="card">';
                 rep +=' <img src="serveur/pochettes/avatar.jpg" class="card-img-top tailleImg" alt="...">';
                 rep +=' <div class="card-body">';
                 rep +=' <h5 class="card-title">'+titre+'</h5>';
                 rep +=' <p class="card-text">Réalisateur : '+res+'</p>';
                 rep +=' <p class="card-text">Durée : '+duree+'</p>';
                 rep +=' <a href="#" class="btn btn-primary">Bande annonce</a>';
                 rep +=' <a href="#" onClick="enleverProduit(this,unProduit.title);" class="btn btn-danger"><span style="font-size:18px; color:white;">-</span></a>';
                 rep +=' <!--<button style="float:right;margin-right: 12px;" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                 rep +=' <span style="font-size:18px; color:white;">-</span>';
                 rep +=' </button> -->';
                 rep +=' </div>';
                 rep +=' </div>';
                 rep +=' </div>';
             
        return rep;
}

let listerProduits = (xmlReponse) => {
    let listeProduits = xmlReponse.getElementsByTagName('produit');
  
    let contenu = `<div class="row row-cols-4">`;
    for (let unProduit of listeProduits){
         
            contenu+=remplirCard(unProduit);
    } 
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;
}

let afficherMessage = (msg) => {
    document.getElementById('msg').innerHTML = msg;
    setTimeout(() => {
        document.getElementById('msg').innerHTML = "";
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


const montrerFormEnregProduit = () => {
	document.getElementById('idForms').innerHTML = modalEnregProduits();
	const modalEnregProduit = new bootstrap.Modal('#modalEnregProduit', {
   });
   modalEnregProduit.show();
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
						   <label for="titre" class="form-label">Titre</label>
						   <input type="text" class="form-control is-valid" id="mdtitre" name="mdtitre" required>
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

const modalEnregProduits = () => {
	return `
	<!-- Modal enregistrer produit -->
	<div class="modal fade" id="modalEnregProduit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Enregistrement d'un produit</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- Formulaire enregistrer produit -->
					<form id="formEnregProduit" class="row">
						<div class="col-md-6">
							<label for="titre" class="form-label">Titre</label>
							<input type="text" class="form-control is-valid" id="titre" name="titre" required value="">
						</div>
						<div class="col-md-3">
							<label for="annee" class="form-label">Année de publication</label>
							<input type="number" class="form-control is-valid" id="annee" name="annee" required value="">
						</div>
						<div class="col-md-3">
							<label for="runtime" class="form-label">Durée (minutes)</label>
							<input type="number" class="form-control is-valid" id="runtime" name="runtime" required value="">
						</div>
						<div class="col-md-6">
							<label for="genres" class="form-label">Genres</label>
							<input type="text" class="form-control is-valid" id="genres" name="genres" required value="">
						</div>
						<div class="col-md-6">
							<label for="director" class="form-label">Réalisateur</label>
							<input type="text" class="form-control is-valid" id="director" name="director" required value="">
						</div>
						<div class="col-md-12">
							<label for="actors" class="form-label">Acteurs</label>
							<input type="text" class="form-control is-valid" id="actors" name="actors" required value="">
						</div>
						<div class="col-md-12">
							<label for="plot" class="form-label">Synopsis</label>
							<input type="text" class="form-control is-valid" id="plot" name="plot" required value="">
						</div>
						<div class="col-md-12">
                            <label for="posterUrl" class="form-label">Pochette</label>
                            <input type="file" class="form-control is-valid" id="pochette" name="pochette[]" required>
                        </div>
						<div class="col-12 btn-enreg">
							<br>
							<button class="btn btn-primary" type="button" onClick="ajouterProduit();">Enregistrer</button>
							<button class="btn btn-danger" type="reset">Vider</button>
							<span id="msge"></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin modal enregistrer Produit -->
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
	document.getElementById('mdtitre').value = unProduit.title;
	document.getElementById('mddirector').value = unProduit.director;
	document.getElementById('mdannee').value = unProduit.year;
	document.getElementById('mdruntime').value = unProduit.runtime;
	document.getElementById('mdgenres').value = unProduit.genres;
	document.getElementById('mdactors').value = unProduit.actors;
	document.getElementById('mdplot').value = unProduit.plot;
	document.getElementById('posterUrl').value = unProduit.posterUrl;
  };
