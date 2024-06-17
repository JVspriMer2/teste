<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sqlSelect = "SELECT * FROM registro WHERE id = $id";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nomeCompleto"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
    } else {
        //echo "Nenhum registro encontrado.";
    }
} 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sqlUpdate = "UPDATE registro SET nomeCompleto = '$nome', email = '$email', username = '$username', password = '$password' WHERE id = $id";

        if ($conn->query($sqlUpdate) === TRUE) {
            
            $updateSuccess = true;
            
        } else {
            echo "Erro ao atualizar o registro: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="fdregistro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="edit.js"></script>
</head>
<body>

    <section class="contact">
        <h2>Editar Usuário</h2>

        <form action="edite.php?id=<?php echo $id; ?>" method="POST">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Nome Completo" name="nome" id="nome" class="item" autocomplete="off" value="<?php echo isset($nome) ? $nome : ''; ?>">
                    <div class="error-txt">O nome completo não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Email Address" name="email" id="email" class="item" autocomplete="off" value="<?php echo isset($email) ? $email : ''; ?>">
                    <div class="error-txt">O Email não pode ficar em branco</div>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Username" name="username" id="username" class="item" autocomplete="off" value="<?php echo isset($username) ? $username : ''; ?>">
                    <div class="error-txt">O Username não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Password" name="password" id="password" class="item" autocomplete="off" value="<?php echo isset($password) ? $password : ''; ?>">
                    <div class="error-txt">O Password não pode ficar em branco</div>
                </div>
            </div>

            <button type="submit">Salvar</button>
            <p>Voltar a tela de Usuário! <a href="user.php">Usuário</a></p>


        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener(function() {
            <?php if ($updateSuccess) { ?>
                Swal.fire({
                    title: "Bom trabalho aventureiro!",
                    text: "Seu registro foi atualizado com sucesso!",
                    icon: "success"
                });
            <?php } ?>
        });
    </script>
</body>
</html>