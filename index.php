<?php
session_start ();

if (isset ( $_SESSION ["vorname"] ) && $_COOKIE ["netcar24"] == 1) {
	echo "<font color='red'><b>Hello netcar24</b></font>";
	echo "<br>";
	echo "<b>Eingelogter Benutzer: </b>" . $_SESSION ["vorname"];
	exit ();
} else {
	header ( "Location: http://netcar24.ate.lan/login.php" );
}
?>