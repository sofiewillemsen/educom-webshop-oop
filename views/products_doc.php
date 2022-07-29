<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_products.php');

class ProductsDoc extends BasicDoc
{
    public function __construct($data)
    {
        $this->title = $data['page'];
        $this->intro = $data ['intro'];
        $this->products_from_db = new GetProducts;
        $this->products = $this->products_from_db->getProducts();
    }

    protected function showContent()
    {
        echo '<h1>'.$this->title.'</h1> 
        <p>'.$this->intro.'</p><table>'.PHP_EOL; 
            foreach ($this->products as $product)
             {
                 echo '<tr><td>
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
      
                </td><td>€'

                .$product['price']
                .',-
                </td><td><a href="index.php?page=Login">Log in</a> om te bestellen.';
            }
        echo '</table>'.PHP_EOL; 
    }



}

?>