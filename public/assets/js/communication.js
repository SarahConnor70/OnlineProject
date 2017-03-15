$(document).ready(function() {
    // connexion
    $("#connexion").on('click', function() {
        var mail = entities($("#mail").val());
        var pass = entities($("#pass").val());
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
    //coordonnées
    $('#online').on('submit', function(e) {
        e.preventDefault();  // Le formulaire ne s'envoie pas
        var nomOnline       = entities($('#nomOnline').html());
        var adresseOnline   = entities($('#adresseOnline').html());
        var telephoneOnline = entities($('#telephoneOnline').html());

        if(nomOnline == "" || adresseOnline == '' || telephoneOnline == ''){
            alert('Les champs ne sont pas tous rempli');
        } else {
            $.ajax({
                url: '/coordonnees',
                type: 'POST',
                data: {
                    "nomOnline" : nomOnline,
                    "adresseOnline": adresseOnline,
                    "telephoneOnline": telephoneOnline
                },
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
