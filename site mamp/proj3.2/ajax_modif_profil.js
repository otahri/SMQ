
/* Ajax authentification */

$(document).ready(function() {

    $("#modif").click(function() {

        $.post(
              'modif_mdp.php',
               {
                login: $("input#login").val(),
				nom: $("input#nom").val(),
				check: $("input#check_mdp").val(),
				pwd: $("input#pwd").val(),
				an_mdp: $("input#an_mdp").val(),
				nv_mdp: $("input#nv_mdp").val(),
				cnv_mdp: $("input#cnv_mdp").val(),
                proc: $("input#proc").val() 
               },
               function(data) {
			         
                     if(data=='error1') {
                           $("#resultat").html("<font color=red>Le mot de passe incorrect !!</font>");
                     }
					 else if(data=='error2') {
                           $("#resultat").html("<font color=red>Les deux mots de passe ne sont pas identiques !!</font>");
                     }
					 else if(data=='error3') {
                           $("#resultat").html("<font color=red>Ce login est d&eacute;ja utilis&eacute;</font>");
                     }
                     else {
                           $("#resultat").html("<font color=blue>Modification r&eacute;ussie</font>");
						   location.href = 'index.php' ;
                     }                        
               },

               'text'
        );
    });   

});