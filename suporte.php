<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="sup.css">
</head>
<body>

    <section class="contact">
        <h2>Suporte!</h2>

        <form action="#">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Nome Completo" id="nome" class="item" autocomplete="off">
                    <div class="error-txt">O nome completo não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Endereço de email" id="email" class="item" autocomplete="off">
                    <div class="error-txt">O Email não pode ficar em branco</div>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Numero de Telefone" id="telefone" class="item" autocomplete="off">
                    <div class="error-txt">O Numero de telefone não pode ficar em branco</div>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Assunto" id="assunto" class="item" autocomplete="off">
                    <div class="error-txt">A Subject não pode ficar em branco</div>
                </div>
            </div>

            <div class="textarea-field field">
                <textarea name="" id="mensagem" cols="30" rows="10" placeholder="Sua Mensagem" class="item" autocomplete="off"></textarea>
                <div class="error-txt">A sua mensagem não pode ficar em branco</div>
            </div>

            
            <button type="submit">Enviar Mensagem</button>
        </form>
    </section>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="supjs.js"></script>
</body>
</html>