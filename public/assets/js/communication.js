$(document).ready(function() {
    $(document).on('click', function(e) {
        if (e.target.id.length == 1 && !isNaN(e.target.id)) {
            var ville = $(this).find('#direction' + e.target.id).text().split(",");
            var tab   = [];
            for (var i = 0; i < ville.length; i++) {
                tab.push(ville[i]);
            }
            getLalOn(tab);
        }
    })
    // load stages + stagiaires
    loadStagiaire();
    loadStages();
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
        var resultatTravail    = $('#resultatTravail').val();
        var resultatCuriosite  = $('#resultatCuriosite').val();
        var resultatDynamisme  = $('#resultatDynamisme').val();
        var resultatDiscours   = $('#resultatDiscours').val();
        var resultatMobilite   = $('#resultatMobilite').val();
        var pointTravail       = $('#pointTravail').val();
        var pointCuriosite     = $('#pointCuriosite').val();
        var pointDynamisme     = $('#pointDynamisme').val();
        var pointDiscours      = $('#pointDiscours').val();
        var pointMobilite      = $('#pointMobilite').val();
        var total              = $('#total').val();
        var commentaire2       = $('#commentaire2').val();
        var commentaires2      = $('#commentaires2').val(); 
        var resultatMetier     = $('#resultatMetier').val();
        var resultatEntreprise = $('#resultatEntreprise').val();
        var resultatProjet     = $('#resultatProjet').val();
        var pointMetier        = $('#pointMetier').val();
        var pointEntreprise    = $('#pointEntreprise').val();
        var pointProjet        = $('#pointProjet').val();
        var total1             = $('#total1').val();
        var commentaire3       = $('#commentaire3').val();
        var commentaires3      = $('#commentaires3 ').val();
        var resultatCulture    = $('#resultatCulture').val();
        var pointCulture       = $('#pointCulture').val();
        var total2             = $('#total2').val();
        var commentaire4       = $('#commentaire4').val();
        var NbPoints           = $('#NbPoints').val();
        var note               = $('#note').val();


        if (date!='' || connuFormation!='' || age!='' || prescription!='' || status!='' || prescripteur!='' || contreIndic!='' || commentaire!='' || resultatNiveau!='' || resultatFormation!='' 
                     || resultatExperience!='' || pointNiveau!='' || pointFormation!='' || pointExperience!='' || commentaire1!=''|| resultatTravail!='' || resultatCuriosite!='' || resultatDynamisme!='' 
                     || resultatDiscours!='' || resultatMobilite!='' || pointTravail!='' || pointCuriosite!='' || pointDynamisme!='' || pointDiscours!='' || pointMobilite!='' || total!='' || commentaire2!='' 
                     || commentaires2!='' || resultatMetier!='' || resultatEntreprise!='' || resultatProjet!=''|| pointMetier!='' || pointEntreprise!='' || pointProjet!=''|| total1!='' || commentaire3!='' || commentaires3!=''
                     || resultatCulture!='' || pointCulture!='' || total2!='' || commentaire4!='' || NbPoints!='' || note!='') {
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
                "resultatTravail"   : resultatTravail,
                "resultatCuriosite" : resultatCuriosite,
                "resultatDynamisme" : resultatDynamisme,
                "resultatDiscours"  : resultatDiscours,
                "resultatMobilite"  : resultatMobilite,
                "pointTravail"      : pointTravail,
                "pointCuriosite"    : pointCuriosite,
                "pointDynamisme"    : pointDynamisme,
                "pointDiscours"     : pointDiscours,
                "pointMobilite"     : pointMobilite,
                "total"             : total,
                "commentaire2"      : commentaire2,
                "commentaires2"     : commentaires2, 
                "resultatMetier"    : resultatMetier,
                "resultatEntreprise": resultatEntreprise,
                "resultatProjet"    : resultatProjet,
                "pointMetier"       : pointMetier,
                "pointEntreprise"   : pointEntreprise,
                "pointProjet"       : pointProjet,
                "total1"            : total1,
                "commentaire3"      : commentaire3,
                "commentaires3"     : commentaires3,                                    
                "resultatCulture"   : resultatCulture,
                "pointCulture"      : pointCulture,
                "total2"            : total2,
                "commentaire4"      : commentaire4,
                "NbPoints"          : NbPoints,
                "note"              : note,
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

    function operation(champ){

        var resultat = champ * 10 / 16;
        return resultat; 
    }
    function addition(champ1, champ2, champ3, champ4, champ5){
        var champs1 = parseFloat(champ1);
        var champs2 = parseFloat(champ2);
        var champs3 = parseFloat(champ3);
        var champs4 = parseFloat(champ4);
        var champs5 = parseFloat(champ5);

        var add; 
        return add = parseFloat(champs1 + champs2 + champs3 + champs4 + champs5);
     }
     function addition1(champ1, champ2, champ3){
        var champs1 = parseFloat(champ1);
        var champs2 = parseFloat(champ2);
        var champs3 = parseFloat(champ3);

        var add; 
        return add = parseFloat(champs1 + champs2 + champs3);

     }

     function multiplier(champ1){

        var champs1 = parseFloat(champ1);

        var multiple = parseFloat(champs1 * 4);
        multiple = multiple + '/40';
        return multiple;

     }

    $('#calculerResultat').on('click', function(e){

        e.preventDefault();
        $('#pointTravail').val(operation($('#resultatTravail').val()));
        $('#pointCuriosite').val(operation($('#resultatCuriosite').val()));
        $('#pointDynamisme').val(operation($('#resultatDynamisme').val()));
        $('#pointDiscours').val(operation($('#resultatDiscours').val()));
        $('#pointMobilite').val(operation($('#resultatMobilite').val()));
        $('#pointMetier').val(operation($('#resultatMetier').val()));
        $('#pointEntreprise').val(operation($('#resultatEntreprise').val()));
        $('#pointProjet').val(operation($('#resultatProjet').val()));
        $('#total').val(addition($('#pointTravail').val(), $('#pointCuriosite').val(), $('#pointDynamisme').val(), $('#pointDiscours').val(), $('#pointMobilite').val()));
        $('#total1').val(addition1($('#pointMetier').val(), $('#pointEntreprise').val(), $('#pointProjet').val()));
        $('#pointCulture').val($('#resultatCulture').val());
        $('#total2').val($('#pointCulture').val());
        $('#commentaire4').val(multiplier($('#total2').val()));
        $('#NbPoints').val(addition1($('#total').val(), $('#total1').val(), $('#total2').val()));
        $('#note').val($('#NbPoints').val());
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

    $('#recherchePDF').on('click', function(e){
        e.preventDefault();
    });

    $('#rechercheFormationPDF').on('click', function(e){
        e.preventDefault();
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

    function loadStages() {
        $.ajax({
            url: '/jvisite',
            method: 'POST',
            success: function(json) {
                console.log
                if (json == "") {
                    $("#jvisite").html("Pas de stagiaire");
                } else {
                    var i     = 0;
                    var ls     = '';
                    for (var test in json) { 
                        i++;
                        ls += '<tr>';
                        ls += '<td class="text-center" >' + test + '</td>';
                        ls += '<td class="text-center" >' + json[test].length + '</td>';
                        ls += '<td class="text-center" id="direction' + i + '">' + json[test].join(",") + '</td>';
                        ls += '<td class="text-center" ><button id="' + i + '" class="btn btn-primary" >Charger la map</button></td>';
                        ls += '</tr>';
                        $("#jvisite").html(ls);
                    }
                }
            }
        });
    }

    function getLalOn(ville) {
        var tab = [{
            name: "OnlineFormaPro Vesoul", 
            lat:47.63771, 
            long:6.15067 
        }];
        for (var villes in ville) {
            console.log(ville[villes]);
            $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' + ville[villes].replace(/ /g, '+') + '&key=AIzaSyBSPF5q5m2uk0mcsHl48SFcCukZ7ksQY_E',
                method: 'GET',
                async: false,
            
            }).done(function(json) {
                console.log(json);
                var localisation = json.results[0]["geometry"]["location"];
                tab.push({
                    name: ville[villes],
                    lat: localisation["lat"],
                    long: localisation["lng"]
                });
            });
        }
        calculate(tab);

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
