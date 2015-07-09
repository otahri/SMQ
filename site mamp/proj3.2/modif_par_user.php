<?php session_start();
include('config.php'); 
 require_once ("fonctions.php");

 $op = true;
 
 
if($_POST['check'])
	{ 
			if($_POST['cnv_mdp']!=$_POST['nv_mdp'])
				{ $op= false; 
				echo 'error1';
				}
			
			}
if($op==true)
{if($_POST['login']!=$_POST['login_act']) { $requete = "SELECT * FROM user WHERE login = '".$_POST['login']."' ";

$resulta=ExecRequete ( $requete , $connexion ) ;
$affected_rows = mysql_num_rows($resulta);

if($affected_rows == 1) 
{
$op= false;
echo 'error2';
} }
}
if($op==true) {

$sql = "UPDATE user SET login='".$_POST['login']."' , pseudo='".$_POST['nom']."' WHERE id='".$_POST['id']."'";
 mysql_query($sql ) ;
 
 if($_POST['proc']>=0){
 $sqlp = "UPDATE user SET proc='".$_POST['proc']."' WHERE id='".$_POST['id']."'";
 mysql_query($sqlp ) ;
 }
 
 if($_POST['check']) {
 $pwd=md5($_POST['nv_mdp']);
 $sql2 = "UPDATE user SET pwd='".$pwd."'  WHERE id='".$_POST['id']."'";
 mysql_query($sql2 ) ;
 } 
 }
?>