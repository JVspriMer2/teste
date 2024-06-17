<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de imagem</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <input type="submit" name="enviar">
    </form>

    <?php
if (isset($_POST['enviar'])) {
    if (!empty($_FILES['arquivo']['name'])) {
        $nomeArquivo = $_FILES['arquivo']['name'];
        $tipo = $_FILES['arquivo']['type'];
        $nomeTemporario = $_FILES['arquivo']['tmp_name'];
        $tamanho = $_FILES['arquivo']['size'];
        $erros = array();

        $tamanhoMaximo = 1024 * 1024 * 5;
        if ($tamanho > $tamanhoMaximo) {
            $erros[] = "Seu arquivo excede o tamanho máximo de 5MB<br>";
        }

        $arquivosPermitidos = ["png", "jpg", "jpeg"];
        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
        if (!in_array($extensao, $arquivosPermitidos)) {
            $erros[] = "Arquivo não permitido<br>";
        }

        $typespermitidos = ["image/png", "image/jpg", "image/jpeg"];
        if (!in_array($tipo, $typespermitidos)) {
            $erros[] = "Tipo de arquivo não permitido<br>";
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro;
            }
        } else {
            $caminho = "uploads/";

            if (move_uploaded_file($nomeTemporario, $caminho . $nomeArquivo)) {
                echo "Upload feito com sucesso";
            } else {
                echo "Erro ao mover o arquivo para a pasta de destino";
            }
        }
    }
}
?>


</body>
</html>