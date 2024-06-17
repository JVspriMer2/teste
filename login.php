
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="fdlogin.css">
</head>

<body>
    

    <section class="contact">
        <h2>Login</h2>

        <form action="testlogin.php" method="POST">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Username" name="username" id="username" class="item" autocomplete="off">
                    <div class="error-txt">O Username não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" id="password" class="item" autocomplete="off">
                    <div class="error-txt">O Password não pode ficar em branco</div>
                </div>
            </div>
            
            <input class="inputSubmit" type="submit" name="submit" value="Login">
            <p>Não tenho uma conta! <a href="registro.php" class="register-link">Registrar-se</a></p>
        </form>
    </section>

    <script src="script2.js"></script>
</body>
</html>