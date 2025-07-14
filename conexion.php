<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$nombre_db = "todolist";
$puerto = 3307;

$conn = new mysqli($host, $usuario, $contraseña, $nombre_db, $puerto);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
} 

if (isset($_POST['agregar_tarea'])) {
    $tarea = $_POST['tarea'];
    $sql = 'INSERT INTO tarea (tarea) VALUE (?)';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$tarea]);


    header("Location: index.php");
    exit;

}

if (isset($_GET["id"])){

    $id = $_GET["id"];
    $sql = "DELETE FROM tarea WHERE id=?";
    $sentencia= $conn->prepare($sql);
    $sentencia->execute([$id]);
}



if (isset($_POST['marcar_completado']) && isset($_POST['id_tarea'])) {
    $id = $_POST['id_tarea'];
    
    $nuevo_estado = 1;

    $sql = "UPDATE tarea SET completado = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $nuevo_estado, $id);
    $stmt->execute();


    header("Location: index.php");
    exit;
}



$resultado = $conn->query("SELECT * FROM tarea");
$registro = $resultado->fetch_all(MYSQLI_ASSOC);



?>
