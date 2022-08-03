<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_products.php');

class DetailDoc extends BasicDoc
{
    public function __construct($data)
    {
        $this->products_from_db = new GetProducts;
        $this->products = $this->products_from_db->getProducts();
        $this->id = $_GET['id'];
        $this->title = '';
    }

    protected function showContent(){
    
    $product = $this->products[$this->id];

    echo '<h1>'
      .$product['name']
      .'
      </h1>
      <p>
      <img src="/educom-webshop-oop/Images/'
      .$product['picture']
      .'" alt="'
      .$product['picture']
      .'" style="width:300px;height:380px;">
      </p>
      
      <p>'
      .$product['description']
      .'</p>
      
      <p>€'
      .$product['price']
      .',-';
      
      if (isset($_SESSION["username"]))
            {
                echo '<form action="index.php" method="POST" > 
                <input type="hidden" name="page" value="webshop" />
                <input type="hidden" name="id" value="'.$product['id'].'">
                 <br><button type="submit" value="submit">Koop</button><br><br><br>
                </form></td>'.PHP_EOL;
            }
            else
            {
                echo '</td><td><a href="index.php?page=login">Log in</a> om te bestellen.</td>'.PHP_EOL;
            }
   }
}

?>