<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "cadastro";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM registro WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: menu.php');
        exit();
    } else {
        echo "Username ou password incorretos.";
        header('Refresh: 2; URL=login.php');
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: login.php');
    exit();
}
?>