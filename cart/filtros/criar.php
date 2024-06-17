<?php
 
ob_start();
require('../sheep_core/config.php');

$carrinho = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(isset($carrinho['addcarrinho'])){
    unset($carrinho['addcarrinho']);
    
    $salvar = new Carrinho();
    $salvar->AddCarrinho($carrinho);

    if($salvar->getResultado()){
        header("Location: ".HOME."/loja.php?sucesso=true");
    }else{
        header("Location: ".HOME."/loja.php?erro=true");
    }
}


?>