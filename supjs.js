const form = document.querySelector('form');
const fullName = document.getElementById("nome");
const email = document.getElementById("email");
const phone = document.getElementById("telefone");
const subject = document.getElementById("assunto");
const mess = document.getElementById("mensagem");

function sendEmail() {
    const bodyMessage = `Full Name: ${fullName.value}<br> Email: ${email.value}<br> Phone Number: ${phone.value}<br> Message: ${mess.value}<br>`;


    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "metalifeodyssey@gmail.com",
        Password: "40FB4F045D21997C54ADF624336D8D0911F6",
        To: 'metalifeodyssey@gmail.com',
        From: "metalifeodyssey@gmail.com",
        Subject: subject.value,
        Body: bodyMessage
    }).then(
        message => {
            if (message == "OK") {
                Swal.fire({
                    title: "Bom trabalho!",
                    text: "Sua mensagem foi enviada para a equipe de Suporte!",
                    icon: "success"
                });
            }

        }

    );

}

function checkInputs() {
    const items = document.querySelectorAll(".item");

    for (const item of items) {
        if (item.value == "") {
            item.classList.add("error");
            item.parentElement.classList.add("error");
        }

        item.addEventListener("keyup", () => {
            if (item.value != "") {
                item.classList.remove("error");
                item.parentElement.classList.remove("error");
            }
            else {
                item.classList.add("error");
                item.parentElement.classList.add("error");
            }
        })
    }
}

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        checkInputs();

        sendEmail();
    })