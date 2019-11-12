<?php
session_start();


$database_connexionLogin 	= "rbstravelcom_wafa";
$username_connexionLogin	= "rbstravelcom_wafa";
$password_connexionLogin	="wafa2018";  
$hostname_connexionLogin	= "localhost";
/*
$database_connexionLogin 	= "rbs_travel";
$username_connexionLogin	= "root";
$password_connexionLogin	= "";
$hostname_connexionLogin	= "localhost";

*/

$connexionLogin = @mysql_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin) or trigger_error(mysql_error(),E_USER_ERROR);
 	mysql_set_charset('utf8',$connexionLogin);
@mysql_select_db($database_connexionLogin, $connexionLogin) or die(mysql_error());
?>