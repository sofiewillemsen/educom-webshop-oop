<?php

// Laat de heading zien van winkelwagen

function showCartHeading(){
    echo '<h1>Winkelwagen</h1>';
}

// Bereken de totale prijs van de cart

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


// Toon de producten in de cart, de totale prijs en de button voor afrekenen

function showCart(){

if (isset($_SESSION['cart_products'])){
    require_once('data_access_layer.php');
    $totalPrice = totalPrice();
    $_SESSION['ordernumber'] = createOrderNumber();
    foreach ($_SESSION['cart_products'] as $product){

    echo '<table><tr><td>
      <img src="/educom-webshop-database/Images/'
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
    <td>';
    
    require_once('forms.php');
    openForm('cart','');
    echo '<input type="hidden" name="id" value="'.$product['id'].'">';
    echo '<input type="hidden" name="ordernumber" value="'.$_SESSION['ordernumber'].'"';
    closeForm($submit_caption="Afrekenen");
    '<br>';
    }
    else{
        echo '<p>Uw winkelwagen is leeg. Ga naar de webshop om producten toe te voegen.</p>';
    }
}

?>