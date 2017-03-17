$(document).ready(function() {
    // connexion
    $("#connexion").on('click', function() {
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        if ((mail == "") || (pass == "")) {
            faireNotif("Veuillez remplir les champs demandés.", "error");
        } else {
            $.ajax({
                url: '/',
                type: 'POST',
                data: JSON.stringify({
                    'email': mail,
                    'pass': pass
                }),
                success: function(json) {
                    if (json["erreur"] == false) {
                        $(location).attr('href', '/dashboard');
                    } else {
                        faireNotif(json["message"], "error");
                    }
                }
            })
        }
    });

    //Créer un stagiaire
    $('#ajouter').on('click', function(e){
        e.preventDefault();
        var nomStagiaire = $('#nomStagiaire').val();
        var prenomStagiaire = $('#prenomStagiaire').val();
        var telephoneStagiaire = $('#telephoneStagiaire').val();
        var mailStagiaire = $('#mailStagiaire').val();
        var adresseStagiaire = $('#adresseStagiaire').val();
        var cpStagiaire = $('#cpStagiaire').val();
        var villeStagiaire = $('#villeStagiaire').val();

        if(nomStagiaire != '' || prenomStagiaire != '' || telephoneStagiaire != '' ||
         mailStagiaire != '' || adresseStagiaire != '' || cpStagiaire != '' || villeStagiaire != ''){
            $.ajax({
                url:'/stagiaire',
                type: 'POST',
                data: {
                    "nomStagiaire": nomStagiaire,
                    "prenomStagiaire": prenomStagiaire,
                    "telephoneStagiaire": telephoneStagiaire,
                    "mailStagiaire": mailStagiaire,
                    "adresseStagiaire": adresseStagiaire,
                    "cpStagiaire": cpStagiaire,
                    "villeStagiaire": villeStagiaire,
                },
                success: function(json){
                    if(json.reponse == 'ok') {
                        faireNotif('json ok pour envoie des données', 'primary');
                    } else {
                        faireNotif('erreur lors de l\'envoi des données', 'error');
                    }
                },
                error: function(json) {
                    faireNotif('Erreur..', 'error');
                }
            });
        }
    });

    //formation
    $('#maj').on('click', function (e){
        e.preventDefault();
        var debut       = $('#dateDebut').val();
        var fin         = $('#dateFin').val();
        var placeRegion = $("#placeRegion").val();
        var placeSupp   = $("#placeSupp").val();
        var intitule    = $("#intitule").val();
        var titre       = $('#titre').val();

        // Récupère l'année de début et de fin
        var annee1 = debut.split("-");
        var annee2 = fin.split("-");
        var promo;

        // Si l'année est la même la promo est l'année de début
        if(annee1[0] == annee2[0]){
            promo = annee1[0];
        }

        // Sinon la promo est année1 année2
        else{
            promo = annee1[0] + " " + annee2[0];
        }

        if(debut == '' || fin == '' || placeRegion == '' || placeSupp == '' || intitule == '' || titre == ''){
            alert('Les champs ne sont pas tous rempli');
        }
        else{
            $.ajax({
                url :'/formation',
                type: 'POST',
                data: {
                    "dateDebut": debut,
                    "dateFin": fin,
                    "placeRegion": placeRegion,
                    "placeSupp": placeSupp,
                    "intitule": intitule,
                    "titre": titre,
                    "promo": promo
                },
                success: function(json){
                    var jsons = JSON.parse(json);
                    if(jsons.reponse == 'ok'){
                        faireNotif("json ok pour envoie des données", "primary");
                    }
                    else{
                        faireNotif("Problème json pour envoie des données", "error");
                    }
                },
                error: function(error){
                    faireNotif("Un problème est survenu ...", "error");
                }
            });
        }
    });

    //coordonnées
    $('#online').on('submit', function(e) {
        e.preventDefault();  // Le formulaire ne s'envoie pas
        var nomOnline       = $('#nomOnline').html();
        var adresseOnline   = $('#adresseOnline').html();
        var telephoneOnline = $('#telephoneOnline').html();

        if(nomOnline == "" || adresseOnline == '' || telephoneOnline == ''){
            alert('Les champs ne sont pas tous rempli');
        } else {
            $.ajax({
                url : '/coordonnees',
                type: 'POST',
                data: "nomOnline=" + nomOnline + "&adresseOnline=" + adresseOnline + "&telephoneOnline=" + telephoneOnline,  // envoie les données du formulaire
                dataType: 'json',
                success: function(json){
                    if(json.reponse == 'ok'){
                        faireNotif("json ok pour envoie des données", "primary");
                    } else {
                        faireNotif("Problème json pour envoie des données", "error");
                    }
                },
                error: function(error) {
                    faireNotif("Un problème est survenu ...", "error");
                }
            });
        }
    });

    function entities(word) {
        return word.replace(/[^/\"_+-=a-zA-Z 0-9]+/g,'');
    }

    function faireNotif(message, type) {
        noty({
            text: message,
            dismissQueue: true,
            progressBar : true,
            type: type,
            theme : 'relax',
            animation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            }
        });
    }
});