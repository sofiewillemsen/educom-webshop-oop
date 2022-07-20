<?php

// Laat de titel van de Webshop zien

function showWebshopHeading(){
    echo '<h1>Webshop</h1> <p>Zie hier al mijn mooie tweedehands en vintage kleding! 
    Log in om producten te bestellen.</p>';
}

// Haal producten uit de database 

/* Laat de producten zien in een tabel met bij elk product de optie om 
naar de detailpagina te gaan en de optie product te kopen afhankelijk van login */

function showProducts(){
    require_once('index.php');
    require_once('data_access_layer.php');
    $products = getProducts();

    var_dump($products);

    echo '<table>'.PHP_EOL; 
    foreach ($products as $product)
    {
      echo '<tr><td>
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
      
      </td><td>€'

      .$product['price']
      .',-';

      if (checkSession()){
        require_once('forms.php');
        openForm('webshop','');
        echo '<input type="hidden" name="id" value="'.$product['id'].'">';
        closeForm($submit_caption="Koop");
      }else{
        echo '</td><td><a href="index.php?page=login">Log in</a> om te bestellen.';
    }
    }
echo '</table>'.PHP_EOL;    
}

?>