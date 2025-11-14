<?php
// Código creado con ayuda de la inteligencia artificial

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "floreria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$cantidad = $_POST['personas'];

// Insertar los datos en la tabla reservas
$sql = "INSERT INTO reservas (fecha_entrega, hora_entrega, cantidad_arreglos) 
        VALUES ('$fecha', '$hora', '$cantidad')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva registrada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>