<!DOCTYPE html>
<html>
	<head>
			<title>Inloggen</title>
			<link rel="stylesheet" type="text/css" href="..\style\global.css">
	</head>
	<body>
		<h1>inloggen</h1>
		<form method="post" action="" >
		<table border="1">
		<tr>
			<td>gebruikersnaam</td>
			<td><input type="text" name="username" /></td>			
		</tr>
		<tr>
			<td>wachtwoord</td>
			<td><input type="password" /></td>
			<input type="hidden" name="contrle" value="test" />
		</tr>
		<tr>
			<td colspan="2"><input type="button" value="inloggen" name="login"></td>
		</tr>
		<tr>
			<td><a href="">wachtwoord vergeten</a></td>
			<td><a href="">Aanmelden</a></td>
		</tr>
		</table>
		</form>
		
	</body>
</html>