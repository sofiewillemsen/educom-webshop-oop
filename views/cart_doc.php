<?php
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');

class CartDoc extends BasicDoc
{
    public function __construct($data)
    {
        $this->title = 'cart';
    }

    function showContent()
    {
        echo '<h1>Cart</h1>';

    if (isset($_SESSION['cart_products']))
        {
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/webshop_model.php');
        $cart = new WebshopModel();
        $totalPrice = $cart->totalPrice();
        $_SESSION['ordernumber'] = createOrderNumber();
        foreach ($_SESSION['cart_products'] as $product)
            {
    
                echo '<table><tr><td>
                <img src="/educom-webshop-oop/Images/'
                .$product['picture']
                .'" alt="'
                .$product['picture']
                .'" style="width:128px;height:160px;">
                </td><td>
            
                <a href="index.php?page=detail&id='
                .$product['id']
                .'">'
                .$product['name']
                .'</a>
                
                </td><td> €'
            
                .$product['price']
                .',-<br></td>
                </table>';
            }
        echo '<tr><br><b>Totaal: €'.$totalPrice.',- 
        </b></td>
        <td>
        <form action="index.php" method="POST" > 
        <input type="hidden" name="page" value="cart" />
        <input type="hidden" name="id" value="'.$product['id'].'">
        <input type="hidden" name="ordernumber" value="'.$_SESSION['ordernumber'].'"
        <br><button type="submit" value="submit">Afrekenen</button><br><br><br>
        </form></td>'.PHP_EOL;
        }
        else
        {
            echo '<p>Uw winkelwagen is leeg. Ga naar de webshop om producten toe te voegen.</p>';
        }
    }
}
?>