$(document).ready(function() {
    // connexion
    $("#connexion").on('click', function() {
        console.log("hello");
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        if ((mail == "") || (pass == "")) {
            fairNotif("Veuillez remplir les champs demandés.");
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
                        fairNotif(json["message"]);
                    }
                }
            })
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
                url: '/coordonnees',
                type: 'POST',
                data: "nomOnline=" + nomOnline + "&adresseOnline=" + adresseOnline + "&telephoneOnline=" + telephoneOnline,  // envoie les données du formulaire
                dataType: 'json',
                success: function(json){
                    console.log(json);
                    if(json.reponse == 'ok'){
                        alert('Tout est ok');
                    } else {
                        alert('Problème');
                    }
                },
                error: function(error) {
                    alert('error;');
                    console.log(eval(error));
                }
            });
        }
    });

    function fairNotif(message) {
        noty({
            text: message,
            dismissQueue: true,
            progressBar : true,
            type: 'error',
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
