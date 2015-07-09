<?php
//On demarre les sessions


/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
 $connexion = mysql_connect('localhost', 'root', 'root');
 mysql_select_db('smq',$connexion);



?>