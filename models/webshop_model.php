<?php

Class WebshopModel
{
    function addToCart(){
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');
        $id = $_POST['id'];
        $sql = "SELECT id, name, price, description, picture FROM products WHERE id =".$id."";
        $crud = new Crud;
        $product = $crud->readOneRow($sql, []);
        $_SESSION['cart_products'][$id] = $product;
        UTIL::dumpVar($_SESSION['cart_products']);
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

    function createOrderNumber(){
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');

        $year = date("Y");
        $number = 10001;
        $firstOrderNumber = $year.$number;
    
        $sql =  "SELECT max(ordernumber) FROM orders";
        $crud = new Crud;
        $result = $crud->readOneRow($sql, []);
        
        if ($result !== NULL) {
            $result = mysqli_fetch_assoc($result);
            $maxOrderNumber = $result['max(ordernumber)'];
            
            if (substr($maxOrderNumber, 0, 4) == $year)
            {
            $orderNumber = $maxOrderNumber+1;
            }
            else
            {
            $orderNumber = $firstOrderNumber;
            }
        }
        else
        {
        $orderNumber = $firstOrderNumber;
        }
    
        return $orderNumber;
    }

    function writeToOrders(){
        $ordernumber = $_SESSION['ordernumber'];
        $date = date("dmY");
        $userid = $_SESSION['userid'];
        
        $crud = new Crud;
        $sql =  "INSERT INTO orders (ordernumber, date, userid) VALUES (:ordernumber, :date, :userid)";
        $crud->createRow($sql, array(
            'ordernumber' => [$ordernumber, PDO::PARAM_INT],
            'date' => [$date, PDO::PARAM_INT],
            'userid' => [$userid, PDO::PARAM_INT]
        ));
        }

    function writeToOrdersRegel(){
    
    foreach ($_SESSION['cart_products'] as $product){
       $ordernumber = $_SESSION['ordernumber'];
       $productid = $product['id'];
       $amount = '1';
   
       $sql =  "INSERT INTO orders_regel (productid, ordernumber, amount) VALUES (:ordernumber, :productid, :amount)";
       $crud = new Crud;
       $crud->createRow($sql, array(
        'ordernumber' => [$ordernumber, PDO::PARAM_INT],
        'productid' => [$productid, PDO::PARAM_INT],
        'amount' => [$amount, PDO::PARAM_INT]
       ));
       }
   
   }
 

}