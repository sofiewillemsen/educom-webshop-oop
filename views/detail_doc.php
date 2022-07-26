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
      <img src="/educom-webshop-database/Images/'
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
      
       echo '<p><a href="index.php?page=login">Log in</a> om te bestellen.</p>';
   }
}

?>