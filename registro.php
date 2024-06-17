<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

    $sql = "INSERT INTO registro (nomeCompleto, email, username, password) VALUES ('$nome', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
    } else {
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="fdregistro.css">
</head>
<body>

    <section class="contact">
        <h2>Registrar-se!</h2>

        <form action="registro.php" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Nome Completo" name="nome" id="nome" class="item" autocomplete="off">
                    <div class="error-txt">O nome completo não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Email Address" name="email" id="email" class="item" autocomplete="off">
                    <div class="error-txt">O Email não pode ficar em branco</div>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Username" name="username" id="username" class="item" autocomplete="off">
                    <div class="error-txt">O Username não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="password"  placeholder="Password" name="password" id="password" class="item" autocomplete="off">
                    <div class="error-txt">O Password não pode ficar em branco</div>
                </div>
            </div>


            <button type="submit">Registrar-se</button>
            <p>Já tenho uma conta! <a href="login.php" class="login-link">Login</a></p>
        </form>
</body>
</html>