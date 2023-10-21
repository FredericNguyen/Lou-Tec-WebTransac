let chargerProduitsAJAX = () => {
    $.ajax({
        type : "POST",
        url  : "routes.php",
        data : {"action":"lister"},
        dataType : "json", //text pour voir si bien formé même chose pour xml
        success : (listeProduits) => {//alert(JSON.stringify(listeProduits['listeProduits']));
            // listeProduits = reponse;
        	montrerVue("lister", listeProduits);
        },
        fail : (err) => {
            //Décider du message
        }
    })
}

let requeteEnregistrer = () => {
	let formProduit = new FormData(document.getElementById('formEnreg'));
	formProduit.append('action','enregistrer');
	formProduit.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'routes.php',
		data : formProduit, //$('#formEnreg').serialize()
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
        dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					montrerVue("enregistrer", reponse);
		},
		fail : function (err){
		   
		}
	});
}
// Consulter pour upload de fichiers
// https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

const posterFormAvecFETCH = async () => {
	let formProduit = new FormData(document.getElementById('formEnreg'));
	formProduit.append('action','enregistrer');
	const optionsFetch = {
		method: "POST",
		body: formProduit
	}
	const reponse = await fetch("routes.php", optionsFetch);
	reponseJSON = await reponse.json();
	montrerVue("enregistrer",reponseJSON);
}

const supprimerAvecFetch = async () => {
	let formProduit = new FormData(document.getElementById('formEnlever'));
	formProduit.append('action','supprimer');
	const optionsFetch = {
		method: "POST",
		body: formProduit
	}
	const reponse = await fetch("routes.php", optionsFetch);
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
	if (listeCategories.length == 0) {
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
	listeCategories = reponseJSON.listeCategories;
	}
}
