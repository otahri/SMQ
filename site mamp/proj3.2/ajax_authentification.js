
/* Ajax authentification */

$(document).ready(function() {

    $("#auth:button").click(function() {

        $.post(
              'authentification.php',
               {
                login: $("input#login").val(),
                pass: $("input#pass").val() 
               },
               function(data) {
			         
                     if(data=='ok') {
                           $("#resultat").html("<font color=blue>Authentification r&eacute;ussie</font>");
						   location.href = 'index.php' ;
                     }
                     else {
                           $("#resultat").html("<font color=red>Nom d'utilisateur ou mot de passe incorrect !!</font>");
                     }                        
               },

               'text'
        );
    });   

});