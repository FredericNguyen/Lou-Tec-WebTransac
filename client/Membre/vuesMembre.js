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

const creerCard = (unProduit) => {
	const webLink = "https";
	if (unProduit.pochette.substring(0, webLink.length) != webLink) {
		unProduit.pochette = `serveur/Produit/photos/${unProduit.pochette}`;
	}
	return `
	<div class="card-group">
		<div class="card mb-3" >
			<div class="no-gutters card-container">
				<div class="col-md-3">
					<img class="card-img-top" src="../../${unProduit.pochette}" alt="Card image cap">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">${unProduit.idP} | ${unProduit.nom}</h5>
						<div class="card-text">Catégorie: ${unProduit.categorie}</div>
						<p class="card-text">Prix: ${unProduit.prix} $ | Inventaire: ${unProduit.qt_inventaire}</p>
						<p class="card-text">${formatProduitTexte(unProduit.description)}</p>
						<div class="div-icones">
                        <img src="../../client/assets/img/cart.svg" onClick=';'></img>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	`;
}

const listerAvecCards = (listeProduits) => {
	let resultat =`<div class="row">`;
	for(let i=0; i<(listeProduits.listeProduits.length); i++){
        resultat += creerCard(listeProduits.listeProduits[i]);
	}
	resultat += "</div>";
	// document.getElementsByClassName('container')[0].innerHTML = construireNav();
	document.getElementsByClassName('container')[1].innerHTML = resultat;
}