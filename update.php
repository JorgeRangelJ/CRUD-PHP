<?php
	include_once('config.php');

	$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE id=:id";
	$query = $pdo->prepare($sql);

	$query->execute([
		'id' => $id
	]);

	$row = $query->fetch(PDO::FETCH_ASSOC);
	$nameValue = $row['name'];
	$emailValue = $row['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Databases Curso</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Actualizar Usuarios</h1>
		<a href="list.php">Atrás</a>s
		<form action="update.php" method="POST">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $nameValue; ?>">
			<br>
			<label for="email">Correo</label>
			<input type="email" name="email" id="email" value="<?php echo $emailValue; ?>">
			<br>
			<input type="submit" value="Update">
		</form>
	</div>
</body>
</html>