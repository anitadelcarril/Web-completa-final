<?php
// Conectar a la base de datos (cambia las credenciales según tu configuración)
$conexion = new mysqli("localhost", "root", "", "nmyp2");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario de registro
$nombre_usuario = $_POST["nombre_usuario"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
$genero = $_POST["genero"];
$pelicula_elegida = $_POST["pelicula_elegida"];

// Insertar datos en la base de datos
$insertar = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('$nombre_usuario', '$email', '$password', '$genero', '$pelicula_elegida')";
if ($conexion->query($insertar) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $insertar . "<br>" . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
