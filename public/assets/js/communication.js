$(document).ready(function(){

	$('#online').on('submit', function(e){
		e.preventDefault();  // Le formulaire ne s'envoie pas

		var $this = $(this);  // stocke le formulaire

		var nomOnline   = $('#nomOnline').html();
		var adresseOnline   = $('#adresseOnline').html();
		var telephoneOnline = $('#telephoneOnline').html();

		if(nomOnline == "" || adresseOnline == '' || telephoneOnline == ''){
			alert('Les champs ne sont pas tous rempli');
		}
		else{
			$.ajax({
				url: '/coordonnees',
				type: 'POST',
				data: $this.serialize(),  // envoie les données du formulaire
				dataType: 'json',
				success: function(json){
					if(json.reponse == 'ok'){
						alert('Tout est ok');
					}
					else{
						alert('Problème');
					}
				}
			});
		}
	});
});