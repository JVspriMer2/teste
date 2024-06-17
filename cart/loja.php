<?php
ob_start();
require('./sheep_core/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/loja.css">
    <title>Loja Meta Life Odyssey</title>
</head>

<body>

<?php
$cart = new Ler();
$cart->Leitura('carrinho');
?>

    <!--- Topo do Site !--->

    <div class="header">
        <p class="logo">Loja Meta Life</p>
        <div class="cart"><i class="fa fa-shopping-cart"></i>
            <p><?=$cart->getContaLinhas() > 0 ?$cart->getContaLinhas() : 0?></p>
        </div>
    </div>
    <!--- Fim do topo do Site !--->

    <!--- Corpo do Site !--->
    <div class="container">

        <div class="linha-produtos">

            <?php
            $ler = new Ler();
            $ler->Leitura('produtos', "ORDER BY data DESC");
            if ($ler->getResultado()) {
                foreach ($ler->getResultado() as $produto) {
                    $produto = (object) $produto;


            ?>

                    <!--- Produto Inicio !--->
                    <form action="filtros/criar.php" method="POST">
                        <div class="corpoProduto">
                            <div class="imgProduto">
                                <img src="<?=HOME?>/uploads/<?=$produto->capa?>" alt="<?=$produto->nome?>" class="produtoMiniatura">
                            </div>
                            <div class="titulo">
                                <p><?=$produto->nome?></p>
                                <h2>R$<?=$produto->valor?></h2>
                                <input type="hidden" name="id_produto" value="<?=$produto->id?>">
                                <input type="hidden" name="valor" value="<?=$produto->valor?>">
                                <button type="submit" class="button" name="addcarrinho">Adicionar ao carrinho</button>
                            </div>
                        </div>
                    </form>
                    <!--- Fim do Produto Inicio !--->
                    <?php
                            }
                        }
                    ?>


        </div>

        <!--- Barra lateral !--->

        <div class="barraLateral">

            <div class="topoCarrinho">
                <p>Meu Carrinho</p>
            </div>


            <?php
            if($cart->getContaLinhas() > 0){
                foreach($cart->getResultado() as $carts){

            $ler = new Ler();
            $ler->Leitura('produtos', "WHERE id = :id ORDER BY data DESC", "id={$carts['id_produto']}");
            if ($ler->getResultado()) {
                foreach ($ler->getResultado() as $produto) {
                    $produto = (object) $produto;

            ?>
            
            <!--- Produto dentro do Carrinho !--->
            <div class="item-carrinho">

                <div class="linha-da-imagem">
                    <img src="<?=HOME?>/uploads/<?=$produto->capa?>" alt="<?=$produto->nome?>" class="img-carrinho">
                </div>
                <p><?=$produto->nome?></p>
                <h2>R$ <?=$produto->valor?></h2>
                <form action="filtros/excluir.php" method="POST">
                    <input type="hidden" name="id_produto" value="<?=$produto->id?>">
                    <button type="submit" style="border:none; background:none;"><i class="fa fa-trash-o"></i></button>
                </form>


            </div>

            <!--- Fim Produto dentro do Carrinho !--->
            <?php 
                        }
                    }
                }
            }else{
            ?>
            <div class="item-carrinho-vazio">Seu carrinho está vazio!</div>
            <?php 
            }
            ?>


            <?php

            $totalCarrinho = new Ler();
            $totalCarrinho->LeituraCompleta("SELECT SUM(valor) as total FROM carrinho");
            if($totalCarrinho->getResultado()){
                $totalCompras = number_format($totalCarrinho->getResultado()[0]['total'], 2,',','.');
            }else{
                $totalCompras = 0;
            }
            ?>


            <div class="rodape">
                <h3>Total</h3>
                <h2>R$ <?=$totalCompras?></h2>
            </div>


        </div>
        <!--- Fim da Barra lateral !--->
    </div>
    <!--- Fim do Corpo do Site !--->

</body>

</html>