<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');

class ProductsDoc extends BasicDoc
{
    public function __construct($data)
    {
        $this->title = $data['page'];
        $this->intro = $data ['intro'];
        $this->sql = "SELECT id, name, price, description, picture FROM products";
        $this->crud = new Crud;
        $this->products = $this->crud->readMultiRows($this->sql, []);
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
                </td><td>';

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
                echo '</td><td><a href="index.php?page=login">Log in</a> om te bestellen.</td>';
            }
          }
        echo '</table>'.PHP_EOL; 
    }



}

?>