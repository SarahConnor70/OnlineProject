$(document).ready(function() {
    // load stages
    loadStagiaire();
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

    //Resultats des tests
    $('#ajouterResultat').on('click', function(e){
        e.preventDefault();
        var date               = $('#date').val();
        var connuFormation     = $('#connuFormation').val();
        var age                = $('#age').val();
        var prescription       = $('#prescription').val();
        var status             = $('#status').val();
        var prescripteur       = $('#prescripteur').val();
        var contreIndic        = $('#contreIndic').val();
        var commentaire        = $('#commentaire').val();
        var resultatNiveau     = $('#resultatNiveau').val();
        var resultatFormation  = $('#resultatFormation').val();
        var resultatExperience = $('#resultatExperience').val();
        var pointNiveau        = $('#pointNiveau').val();
        var pointFormation     = $('#pointFormation').val();
        var pointExperience    = $('#pointExperience').val();
        var commentaire1       = $('#commentaire1').val();

        if (date!='' || connuFormation!='' || age!='' || prescription!='' || status!='' || prescripteur!='' || contreIndic!='' || commentaire!='' 
            || resultatNiveau!='' || resultatFormation!='' || resultatExperience!='' || pointNiveau!='' || pointFormation!='' || pointExperience!='' || commentaire1!='') {
            $.ajax({
            url:'/stagiaire',
            type: 'POST',
            data: {
                "date"              : date,
                "connuFormation"    : connuFormation,
                "age"               : age,
                "prescription"      : prescription,
                "status"            : status,
                "prescripteur"      : prescripteur,
                "contreIndic"       : contreIndic,
                "commentaire"       : commentaire,
                "resultatNiveau"    : resultatNiveau,
                "resultatFormation" : resultatFormation,
                "resultatExperience": resultatExperience,
                "pointNiveau"       : pointNiveau,
                "pointFormation"    : pointFormation,
                "pointExperience"   : pointExperience,
                "commentaire1"      : commentaire1,
            },
            success: function(json){
                var jsons = JSON.parse(json);
                if(jsons.reponse == 'ok') {
                    faireNotif('Les résultats du stagiaire ont bien été enregistrés!', 'success');
                } else {
                    faireNotif('Echec lors de l\'ajout des résultats.', 'error');
                }
            },
            error: function() {
                faireNotif('Erreur..', 'error');
                }
            });
        }
    });
    
    //Ajouter les stages
    $('#ajouterStage').on('click', function(e){
        e.preventDefault();

        var nomEntreprise       = $('#nomEntreprise').val();
        var adresseEntreprise   = $('#adresseEntreprise').val();
        var telephoneEntreprise = $('#telephoneEntreprise').val();
        var nomTuteur           = $('#nomTuteur').val();

        if(nomEntreprise != '' || adresseEntreprise != '' || telephoneEntreprise != '' || nomTuteur != ''){
            $.ajax({
                url:'/stagiaire',
                type:'POST',
                data:{
                    "nomEntreprise": nomEntreprise,
                    "adresseEntreprise": adresseEntreprise,
                    "telephoneEntreprise": telephoneEntreprise,
                    "nomTuteur": nomTuteur
                },
                success: function(json){
                    var jsons = JSON.parse(json);
                    if(jsons.reponse == 'ok') {
                        faireNotif('Informations de l\'entreprise ok', 'primary');
                    } else {
                        faireNotif('Informations de l\'entreprise incorrect', 'error');
                    }
                },
                error: function(json) {
                    faireNotif('Erreur..', 'error');
                } 
            });
        }
    });
    
    //Chercher un stagiaire
    $("#rechercheStagiaire").on('click', function(e){
        e.preventDefault();
        $('#divRecherche').toggle();
    });
    
    $('#recherche').on('click', function(e){
        e.preventDefault();

        var prenomRecherche = $('#prenomRecherche').val();
        var nomRecherche = $('#nomRecherche').val();

        if(prenomRecherche != '' && nomRecherche != ''){
            $.ajax({
                url:'/stagiaire',
                type:'post',
                data:{
                    "prenomRecherche": prenomRecherche,
                    "nomRecherche" : nomRecherche
                },
                success: function(json){
                    //var jsons = JSON.parse(json);
                    if(json.reponse == 'ok') {
                        $('#nomStagiaire').val(json.recherche.nom);
                        $('#prenomStagiaire').val(json.recherche.prenom);
                        $('#telephoneStagiaire').val(json.recherche.telephone);
                        $('#mailStagiaire').val(json.recherche.mail);
                        $('#adresseStagiaire').val(json.recherche.adresse);
                        $('#cpStagiaire').val(json.recherche.cp);
                        $('#villeStagiaire').val(json.recherche.ville);
                        $('#' + json.recherche.accepter).attr('checked', true);
                        $('#test1').show().addClass("active");
                        $('#test2').removeClass("active").hide();
                        $('#test3').removeClass("active").hide();
                        $('#test4').removeClass("active").hide();
                        faireNotif('Recherche éffectuée', 'primary');
                    } else {
                        faireNotif('Recherche impossible', 'error');
                    }
                },
                error: function(json) {
                    faireNotif('Erreur..', 'error');
                }
            });
        }
    });
    
    
   //Modifier un stagiaire
    $('#modifStagiaire').on('click', function(e){
        e.preventDefault();

        var nomStagiaire = $('#nomStagiaire').val();
        var prenomStagiaire = $('#prenomStagiaire').val();
        var telephoneStagiaire = $('#telephoneStagiaire').val();
        var mailStagiaire = $('#mailStagiaire').val();
        var adresseStagiaire = $('#adresseStagiaire').val();
        var cpStagiaire = $('#cpStagiaire').val();
        var villeStagiaire = $('#villeStagiaire').val();
        var accepter = $('input[name=accepter]:checked').val();

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
                    "accepter": accepter
                },
                success: function(json){
                    var jsons = JSON.parse(json);
                    if(jsons.reponse == 'ok') {
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
        var annee1 = debut.split("/");
        var annee2 = fin.split("/");
        var promo;

        // Si l'année est la même la promo est l'année de début
        promo   = annee1[2] == annee2[2] ? annee1[2] : annee1[2] + " " + annee2[2];

        if(debut == '' || fin == '' || placeRegion == '' || placeSupp == '' || intitule == '' || titre == '') {
            faireNotif("Tous les champs ne sont pas remplis.")
        } else {
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
                    if(json.reponse == 'ok'){
                        faireNotif("La formation ''" + entities(intitule) + "'' a bien été ajouté.", "primary");
                    } else {
                        faireNotif("Erreur lors de l'ajout de la formation.", "error");
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
            faireNotif("Tous les champs ne sont pas remplis.")
        } else {
            $.ajax({
                url : '/coordonnees',
                type: 'POST',
                data: {
                    "nomOnline": nomOnline,
                    "adresseOnline": adresseOnline,
                    "telephoneOnline": telephoneOnline,
                },
                success: function(json){
                    if(json.reponse == 'ok'){
                        faireNotif("Les coordonnées ont bien été sauvegardées.", "primary");
                    } else {
                        faireNotif("Erreur lors du changement des coordonnées.", "error");
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

    function loadStagiaire() {
        $.ajax({
            url: '/dashboard',
            method: 'POST',
            success: function(json) {
                if (json == "") {
                    $("#stage").html("Pas de stagiaire");
                } else {
                    var ls = '';
                    for (var i = 0; i < json.length; i++) {
                        ls += '<tr>';
                        ls += '<td>' + json[i]["nom"] + '</td>';
                        ls += '<td>' + json[i]["prenom"] + '</td>';
                        ls += '<td>' + json[i]["mail"] + '</td>';
                        ls += '<td>' + json[i]["telephone"] + '</td>';
                        ls += '<td>' + json[i]["cp"] + '</td>';
                        ls += '<td>' + json[i]["ville"] + '</td>';
                        ls += '</tr>';
                        $("#stage").html(ls);
                    }
                }
            }
        });
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
    
    $('#atest2').on('click', function(e){
        $('#test1').hide();
    });

    $('#atest3').on('click', function(e){
        $('#test1').hide();
    });

    $('#atest4').on('click', function(e){
        $('#test1').hide();
    });
    
});
