<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');

class DetailDoc extends BasicDoc
{
    public function __construct($data)
    {
        $this->title = '';
        $this->sql = "SELECT id, name, price, description, picture FROM products WHERE id =".$_GET['id']."";
        $this->crud = new Crud;
        $this->product = $this->crud->readOneRow($this->sql, []);

    }

    protected function showContent(){

    echo '<h1>'
      .$this->product['name']
      .'
      </h1>
      <p>
      <img src="/educom-webshop-oop/Images/'
      .$this->product['picture']
      .'" alt="'
      .$this->product['picture']
      .'" style="width:300px;height:380px;">
      </p>
      
      <p>'
      .$this->product['description']
      .'</p>
      
      <p>€'
      .$this->product['price']
      .',-';
      
      if (isset($_SESSION["username"]))
            {
                echo '<form action="index.php" method="POST" > 
                <input type="hidden" name="page" value="webshop" />
                <input type="hidden" name="id" value="'.$this->product['id'].'">
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