// Consulter pour upload de fichiers
// https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

const enregistrerProduit = async () => {
	let formProduit = new FormData(document.getElementById('formEnreg'));
	formProduit.append('action','enregistrer');
	formProduit.append('type_req','produit');
	const optionsFetch = {
		method: "POST",
		body: formProduit
	}
	const reponse = await fetch("../../routes.php", optionsFetch);
	reponseJSON = await reponse.json();
}

const modifierProduit = async () => {
	let formProduit = new FormData(document.getElementById('formEnreg'));
	formProduit.append('action','modifier');
	formProduit.append('type_req','produit');
	const optionsFetch = {
		method: "POST",
		body: formProduit
	}
	const reponse = await fetch("../../routes.php", optionsFetch);
	reponseJSON = await reponse.json();
}

const supprimerAvecFetch = async () => {
	let formProduit = new FormData(document.getElementById('formEnlever'));
	formProduit.append('action','supprimer');
	const optionsFetch = {
		method: "POST",
		body: formProduit
	}
	const reponse = await fetch("../../routes.php", optionsFetch);
	reponseJSON = await reponse.json();
	montrerVue("supprimer",reponseJSON);
}

const chargerProduitsFETCH = async () => {
	const url = "../../routes.php";
	let formData = new FormData();
	formData.append('action','lister');
	formData.append('type_req','produit');
	const optionsFetch = {
		method: "POST",
		body: formData
	}
	const reponse = await fetch( url, optionsFetch);
	reponseJSON = await reponse.json();
	listeProduits = reponseJSON.listeProduits;
	listerAvecCards(reponseJSON);
}

const chargerProduitsFETCHCateg = async () => {
	const url = "../../routes.php";
	let categorie = document.getElementById("selectedCateg").value;
	let formData = new FormData();
	formData.append('action','listerParCateg');
	formData.append('type_req','produit');
	formData.append('categorie',categorie);
	const optionsFetch = {
		method: "POST",
		body: formData
	}
	const reponse = await fetch( url, optionsFetch);
	reponseJSON = await reponse.json();
	listeProduits = reponseJSON.listeProduits;
	listerAvecCards(reponseJSON);
}

const chargerCategoriesFETCH = async () => {
	const url = "../../routes.php";
	let formData = new FormData();
	formData.append('action','categories');
	formData.append('type_req','produit');
	const optionsFetch = {
		method: "POST",
		body: formData
	}
	const reponse = await fetch( url, optionsFetch);
	reponseJSON = await reponse.json();
	listeProduits = reponseJSON.listeProduits;
	listerAvecCards(reponseJSON);
}
