<?php

Class WebshopModel
{
    function addToCart(){
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
        $products = getProducts();
        $id = $_POST['id'];
        $product = $products[$id];
        $_SESSION['cart_products'][$id] = $product;
        var_dump($_SESSION['cart_products']);
    }

    function totalPrice()
    {
        if (($_SESSION['cart_products']) !== NULL){
            $totalPrice = 0;
        foreach ($_SESSION['cart_products'] as $product)
        {
            $totalPrice += $product['price'];
        }
        return $totalPrice;
    }
    }

}