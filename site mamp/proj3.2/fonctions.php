<?php

// Connexion à la base de donnèes
function Connect_bd()
{
 $db_host="localhost";
 $db_user="root";
 $db_pass="root";
 $bd="smq";
 $connexion = mysql_connect($db_host,$db_user,$db_pass);
 if(!$connexion)
{
  echo "Impossible d'établir une connexion au serveur!!\n";
  echo "<b>Message de MySQL :</b> " .  mysql_error($connexion);
  exit;
}

 if(!mysql_select_db($bd,$connexion))
{
  echo "Impossible d'accéder à la base de données smq!!\n";
  echo "<b>Message de MySQL :</b> " .  mysql_error($connexion);
  exit;
}
return $connexion;
}
// Fin de la fonction Connect_bd

// Exécution d'une requête avec MySQL
function ExecRequete ($requete, $connexion)
{
  $resultat = mysql_query ($requete, $connexion);

  if (!$resultat)
  {
    echo "<b>Erreur dans l'exécution de la requête '$requete'.</b><br/>";
    echo "<b>Message de MySQL :</b> " .  mysql_error($connexion);
    exit;
  }
  return $resultat;
}
 // Fin de la fonction ExecRequete

// déconnexion de la bd
function Deconnect_db()
{
  mysql_close();
}
//Fin de la fonction deconnect_db

//fonction pour supprimer un répertoire
function clearDir($dossier) {
	$ouverture=@opendir($dossier);
	if (!$ouverture) return;
	while($fichier=readdir($ouverture)) {
		if ($fichier == '.' || $fichier == '..') continue;
			if (is_dir($dossier."/".$fichier)) {
				$r=clearDir($dossier."/".$fichier);
				if (!$r) return false;
			}
			else {
				$r=@unlink($dossier."/".$fichier);
				if (!$r) return false;
			}
	}
closedir($ouverture);
$r=@rmdir($dossier);
@rename($dossier,"trash");
return true;
}

function joindre_processus_modifie($fichier,$temp)
{
$dossier = '../gestiondoc/arz/';
$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document ou image !');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

function joindre_nouveau_processus ($fichier,$temp)
{
$dossier = '../gestiondoc/arz/';

$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document ou image !');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

//fonction pour joindre un doc à  l'action
function joindre_action($processus,$fichier,$temp)
{
$dossier = '../gestiondoc/arz/';

$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document ou une image !');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

function joindre_doc($processus,$fichier,$temp)
{

$dossier = '../gestiondoc/arz/';
$taille_maxi = 2000000;
for($i=0;$i<sizeof($fichier);$i++)
{
$taille = filesize($temp[$i]);
$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier[$i], '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document PDF ou une image !');
}

if($taille>$taille_maxi)
{
     throw new Exception ('La taille du document '.$i. ' est grande, veuillez choisir un fichier ne dépassant pas 2Mo');
}

//On formate le nom du fichier ici...
$fichier[$i] = strtr($fichier[$i],
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier[$i] = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier[$i]);

if(move_uploaded_file($temp[$i], $dossier.$fichier[$i])) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document '.$i.' joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du document '.$i.' !');
     }
$chemin[$i]=$dossier.$fichier[$i];
}
return $chemin;
}

//fonction pour joindre un doc à un evenement
function joindre_even($fichier,$temp)
{
$dossier = '../gestiondoc/arz/';

$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document ou une image !');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

function datemysql($date_courante)
{
$j = substr($date_courante, 0, 2);
$m = substr($date_courante, 3, 2);
$a = substr($date_courante, 6, 4);
$madate=$a.'-'.$m.'-'.$j;
return $madate;
}

function datesimple($date_courante)
{
$j = substr($date_courante, 8, 2);
$m = substr($date_courante, 5, 2);
$a = substr($date_courante, 0, 4);
$madate=$j.'/'.$m.'/'.$a;
return $madate;
}

function supprimer_fichier($chemin)
{
unlink($chemin); //Suppression du fichier
}

//fonction pour joindre un doc à une action modifiée
function joindre_ancien_action ($processus,$evenement,$action,$fichier,$temp)
{
$dossier ='../gestiondoc/arz/' ;
$taille_maxi = 2000000;
$taille = filesize($temp);
$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un fichier PDF ou une image !');
}

if($taille>$taille_maxi)
{
     throw new Exception ('La taille du fichier est grande, veuillez choisir un fichier ne dépassant pas 800Ko');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

function joindre_doc_rub($fichier,$temp)
{
$dossier = '../Accueil/documents/';

$extensions = array('.pdf','.png', '.gif', '.jpg', '.jpeg','.doc','.docx');
$extension = strrchr($fichier, '.');

if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   throw new Exception  ('Vous devez joindre un document ou image!');
}

//On formate le nom du fichier ici...
$fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

if(move_uploaded_file($temp, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
          echo 'document joint avec succes !<br>';
}
     else //Sinon (la fonction renvoie FALSE).
     {
          throw new Exception ('Echec lors de l\'importation du fichier !');
     }
$chemin=$dossier.$fichier;
return $chemin;
}

// fonction qui calcul le temps qui reste

	function temps_qui_reste($date,$type) {
	if($type == "timestamp") {
		$date1 = $date; // depuis cette date
	} elseif($type == "date") {
		$date1 = strtotime($date); // depuis cette date
	} else {
		return "Non reconnu";
		exit();
	}
	$date2 = date("U"); // à la date actuelle
	if($date1<$date2) echo utf8_encode('la date d\'échéance est dépassée');
	else {
	$return = "";
	// ########  ANNEE ########
	if((date('Y',$date1 - $date2)-1970) > 0) {
		if((date('Y',$date1 - $date2)-1970) > 1) {
			$echo_annee = (date('Y',$date1 - $date2)-1970)." Anneés";
			$return = $echo_annee.", ";
		} else {
			$echo_annee = (date('Y',$date1 - $date2)-1970)." Année";
			$return = $echo_annee.", ";
		}
	} else {
		$echo_annee = "";
		$return = $return;
	}
	// ########  MOIS ########
	if((date('m',$date1 - $date2)-1) > 0) {
		$echo_mois = (date('m',$date1 - $date2)-1)." Mois ";
		if(!empty($echo_annee)) {
			$return = $echo_annee." et ".$echo_mois;
		} else {
			$return = $echo_mois;
		}
	} else {
		$echo_mois = "";
		$return = $return;
	}
	// ########  JOUR ########
	if((date('d',$date1 - $date2)-1) > 0) {
		if((date('d',$date1 - $date2)-1) > 1) {
			$echo_jour = (date('d',$date1 - $date2)-1)." Jours";
			if(!empty($echo_annee) OR !empty($echo_mois)) {
				$return = $return.$echo_mois." et ".$echo_jour;
			} else {
				$return = $return.$echo_mois.$echo_jour;
			}
		} else {
			$echo_jour = (date('d',$date1 - $date2)-1)." Jour";
			if(!empty($echo_annee) OR !empty($echo_mois)) {
				$return = $return.$echo_mois." et ".$echo_jour;
			} else {
				$return = $return.$echo_mois.$echo_jour;
			}
		}
	} else {
		$echo_jour = "";
		$return = $return;
	}
	// ########  HEURE ########
	if((date('H',$date1 - $date2)-1) > 0) {
		if((date('H',$date1 - $date2)-0) > 1) {
			$echo_heure = (date('H',$date1 - $date2)-0)." Heures";
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour)) {
				$return = $echo_annee.$echo_mois.$echo_jour." et ".$echo_heure;
			} else {
				$return = $echo_annee.$echo_mois.$echo_jour.$echo_heure;
			}
		} else {
			$echo_heure = (date('H',$date1 - $date2)-0)." Heure";
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour)) {
				$return = $echo_annee.$echo_mois.$echo_jour." et ".$echo_heure;
			} else {
				$return = $echo_annee.$echo_mois.$echo_jour.$echo_heure;
			}
		}
	} else {
		$echo_heure = "";
		$return = $return;
	}
	// ########  MINUTE ET SECONDE ########
	$virgule_annee = "";
	$virgule_mois = "";
	$virgule_jour = "";
	if(date('i',$date1 - $date2) > 0) {
		if(date('i',$date1 - $date2) > 1) {
			$echo_minute = round(date('i',$date1 - $date2))." Minutes";
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
				if(!empty($echo_annee)) {
					if(!empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_annee = ", ";
					}
				}
				if(!empty($echo_mois)) {
					if(!empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_mois = ", ";
					}
				}
				if(!empty($echo_jour)) {
					if(!empty($echo_heure)) {
						$virgule_jour = " et ";
					}
				}
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//." et ".$echo_minute;
			} else {
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//.$echo_minute;
			}
		} else {
			$echo_minute = round(date('i',$date1 - $date2))." Minute";
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
				if(!empty($echo_annee)) {
					if(!empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_annee = ", ";
					}
				}
				if(!empty($echo_mois)) {
					if(!empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_mois = ", ";
					}
				}
				if(!empty($echo_jour)) {
					if(!empty($echo_heure)) {
						$virgule_jour = " et ";
					}
				}
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//." et ".$echo_minute;
			} else {
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//.$echo_minute;
			}
		}
	} else {
		if(date('s',$date1 - $date2) > 1) {
			$echo_minute = round(date('s',$date1 - $date2))." Secondes";
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
				if(!empty($echo_annee)) {
					if(!empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_annee = ", ";
					}
				}
				if(!empty($echo_mois)) {
					if(!empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_mois = ", ";
					}
				}
				if(!empty($echo_jour)) {
					if(!empty($echo_heure)) {
						$virgule_jour = " et ";
					}
				}
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//." et ".$echo_minute;
			} else {
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//.$echo_minute;
			}
		} else {
			if(!empty($echo_annee) OR !empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
				if(!empty($echo_annee)) {
					if(!empty($echo_mois) OR !empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_annee = ", ";
					}
				}
				if(!empty($echo_mois)) {
					if(!empty($echo_jour) OR !empty($echo_heure)) {
						$virgule_mois = ", ";
					}
				}
				if(!empty($echo_jour)) {
					if(!empty($echo_heure)) {
						$virgule_jour = " et ";
					}
				}
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//." et ".$echo_minute;
			} else {
				$return = $echo_annee.$virgule_annee.$echo_mois.$virgule_mois.$echo_jour.$virgule_jour.$echo_heure;//.$echo_minute;
			}
		}
	}
	return "Il vous reste ".$return;
	}
}

?>