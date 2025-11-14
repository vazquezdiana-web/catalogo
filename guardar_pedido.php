<?php
// Código creado con ayuda de la inteligencia artificial

// 1. Conexión a la base de datos
$host = "localhost";
$usuario = "root"; // por defecto en XAMPP
$contrasena = "";  // por defecto de vació
$basedatos = "floreria";

$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// 2. Recoger datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$direccion = $_POST['direccion'];

// 3. Insertar datos en la base de datos
$sql = "INSERT INTO pedidos (nombre, email, producto, cantidad, direccion)
        VALUES ('$nombre', '$email', '$producto', $cantidad, '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>¡Pedido registrado correctamente!</h2>";
    echo "<a href='index.html'>Regresar a la página principal</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>