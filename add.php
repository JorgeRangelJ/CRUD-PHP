<?php
	//echo "<pre>";
	//var_dump($_POST);

	// añadimos nuestro archivo de configuracion es decir conexion a la base de datos

	require_once ('config.php');

	$result = false;

	if (!empty($_POST)) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5( $_POST['password']);

		$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
		$query = $pdo->prepare($sql);

		$result = $query->execute([
					'name' => $name,	
					'email' => $email,	
					'password' => $password
		]);
	}
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
		<h1>Agregar Usuarios</h1>
		<a href="index.php">Home</a>
		<?php
			if ($result) {
				echo '<div class="alert alert-success">Exitoso!!!</div>
				';
			}
		?>
		<form action="add.php" method="POST">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name">
			<br>
			<label for="email">Correo</label>
			<input type="email" name="email" id="email">
			<br>
			<label for="password">Contraseña</label>
			<br>			
			<input type="submit" value="Save">
		</form>
	</div>
</body>
</html>