<?php
session_start();
require_once ("fonctions.php");
$login=$_POST['login'];
$pass=md5($_POST['pass']);
include('config.php');


echo'ok';



?>