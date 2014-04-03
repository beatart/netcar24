<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login</title>
</head>
<body>
	<img src='img/netcar24.gif'>
	<form action="login.php" method="post">
		Dein Username:<br> <input type="text" size="24" maxlength="50" name="vorname"><br><br> 
		Dein Passwort:<br> <input type="password" size="24" maxlength="50" name="password"><br><br>
		<input type="submit" value="Anmelden">
	</form>
</body>
</html>

<?php
session_start ();

if (isset ( $_REQUEST ["vorname"] ) && isset ( $_REQUEST ["password"] )) {
	
	$vorname = $_POST ["vorname"];
	$password = $_POST ["password"];
	
	$db = new PDO ( 'mysql:host=netcar24.ate.lan;dbname=netcar24homework', 'conan', '1234' );
	$stmt = $db->prepare ( "SELECT username, passwort FROM users WHERE username = '$vorname' AND passwort = $password LIMIT 1" );
	$stmt->execute ();
	$stmt->bindColumn ( 1, $name );
	$stmt->bindColumn ( 2, $pass );
	$stmt->fetch ( PDO::FETCH_BOUND );
	
	if (($pass == $password) && ($name == $vorname)) {
		$_SESSION ["vorname"] = $name;
		setcookie ( "netcar24", 1 );
		header ( "Location: http://netcar24.ate.lan/index.php" );
	} else {
		header ( "Location: http://netcar24.ate.lan/" );
	} 
}
?>