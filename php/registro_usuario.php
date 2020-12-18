<?php


include 'conexion.php';

$nombre_completo= $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$query ="INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";


//verificar que el correo no se repita//
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

if (mysqli_num_rows($verificar_correo) > 0) {
	echo '
	<script>
	alert("Este  correo ya esta registrado, intenta con otro diferente");
	window.location = "../index1.html";
	</script>
	';
exit();
	# code...
}

//verificar que el nombre de usuario no se repita//

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0) {
	echo '
	<script>
	alert("Este usuario ya esta registrado, intenta con otro diferente");
	window.location = "../index1.html";
	</script>
	';
exit();
	# code...
}


$ejecutar  = mysqli_query($conexion, $query);

if ($ejecutar) {
	echo '
	<script>
	alert("Uusario alamacenado exitosamente");
	window.location = "../index1.html";
	</script>';
	# code...
}else{
	echo '<script>
	alert("Intentalo de  nuevo, usuaario no almacenado");
	window.location="../index1.html";
	</script>';
}
mysqli_close($conexion);
?>