<?php session_start();
require_once ("fonctions.php");
$login=$_POST['login'];
$pass=md5($_POST['pass']);
include('config.php');

$requete = "SELECT * FROM user WHERE login='$login' AND pwd='$pass' ";
//Exécution de la requête mySQL et
//affectation du nombre de rangés valides dans la table.
//********************************************
$result=ExecRequete ( $requete , $connexion ) ;
$affected_rows = mysql_num_rows($result);
//Si il y a un enregistrement, la connexion est valide sinon invalide.
//*****************************************************
if($affected_rows == 1) 
{
$_SESSION['user'] = $login;
echo'ok';
}
?>