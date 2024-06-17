<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="fdmenu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <nav class="sidebar">
        <div class="logo-menu">
            <h2 class="logo">Menu</h2>
            <i class='bx bx-menu toggle-btn'></i>
        </div>

        <ul class="list">
            <li class="list-item active">
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link-name" style="--i:1">Painel</span>
                </a>
            </li>
            <li class="list-item">
                <a href="user.php">
                    <i class='bx bx-user' ></i>
                    <span class="link-name" style="--i:2">User</span>
                </a>
            </li>
            <li class="list-item">
                <a href="suporte.php">
                    <i class='bx bx-message-dots' ></i>
                    <span class="link-name" style="--i:3">Ajuda</span>
                </a>
            </li>
            <li class="list-item">
                <a href="/teste/cart/loja.php">
                    <i class='bx bx-store-alt' ></i>
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