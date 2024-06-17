<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="fduser.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section class="records">
    <h2>Usuario</h2>
    <?php
    $sql = "SELECT id, nomeCompleto, email, username, password FROM registro WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>id</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Editar</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nomeCompleto']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['password']}</td>
                    <td><a class='btn btn-primary' href='edite.php?id={$row['id']}'>
                    <i class='bx bxs-edit' style='color:#ffffff'></i>
                    </a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }

    $conn->close();
    ?>
</section>
    
<nav class="sidebar">
    <div class="logo-menu">
        <h2 class="logo">Configuração</h2>
        <i class='bx bx-menu toggle-btn'></i>
    </div>

    <ul class="list">
        <li class="list-item active">
            <a href="menu.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link-name" style="--i:1">Painel</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-user'></i>
                <span class="link-name" style="--i:2">User</span>
            </a>
        </li>
        <li class="list-item">
            <a href="suporte.php">
                <i class='bx bx-message-dots'></i>
                <span class="link-name" style="--i:3">Ajuda</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-store-alt'></i>
                <span class="link-name" style="--i:4">Loja</span>
            </a>
        </li>
        <li class="list-item">
            <a href="inicio.php">
                <i class='bx bx-exit'></i>
                <span class="link-name" style="--i:5">Exit</span>
            </a>
        </li>
    </ul>
</nav>

<script src="menu.js"></script>
</body>
</html>