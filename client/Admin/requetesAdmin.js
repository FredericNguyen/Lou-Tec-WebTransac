function listerMembres(){
	alert("ok");
	let formMembre = new FormData();
	formMembre.append('action','lister_Membres');
	formMembre.append('type_req','admin');
	alert(formMembre.get('type_req'));
	$.ajax({
		type : 'POST',
		url : "../../routes.php",
		data : formMembre,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', 
		//dataType:'text',
		success : function (reponse){
			//alert(reponse.action);
			adminVue(reponse);
		},
		fail : function (err){
			alert(err);
		},
		statusCode: {
			404: function(xhr) {
				alert("Page introuvable");
			}
  		}	
	});
}	

function activeDesactiveMembre(code, etat){
	var formMembre = new FormData();
	formMembre.append('statut', etat);
	formMembre.append('idm', code);
	formMembre.append('action','activer_desactiver');
	formMembre.append('type_req','admin');
	$.ajax({
		type : 'POST',
		url : "../../routes.php",
		data : formMembre,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', 
		//dataType:'text',
		success : function (reponse){	
			adminVue(reponse);
		},
		fail : function (err){
			alert(err);
		},
		statusCode: {
			404: function(xhr) {
				alert("Page introuvable");
			}
  		}	
	});
}