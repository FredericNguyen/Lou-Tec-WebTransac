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