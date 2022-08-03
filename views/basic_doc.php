<?php
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/html_doc.php');

class BasicDoc extends HtmlDoc 
{

    public function __construct($data)
    {
        $this->title = $data['title'];
        if (isset($data['text']))
        {
            $this->text = $data['text'];
        }
        else
        {
            $this->text = '';
        }
    }

    protected function showHeader() 
    { 
       echo "<header><h1><br>Sofie's Webshop </h1> </header>";
    } 

    protected function showMenu()
    {       
        
        if (isset($_SESSION["username"]))
        {
        $menuItems = array('home', 'about', 'contact', 'webshop', 'register', 'logout', 'cart');
        }
        else
        {
        $menuItems = array('home', 'about', 'contact', 'webshop', 'register', 'login');
        }
               echo '<p>
               <ul class="nav">';
               foreach($menuItems as $value)
               {
                  switch($value){
                    case 'logout':
                        echo '<li><a href="index.php?page='.$value.'">'.$value.' '.$_SESSION['username'].'</a></li>'.PHP_EOL;
                    break;
                    default:
                        echo '<li><a href="index.php?page='.$value.'">'.$value.'</a></li>'.PHP_EOL;
                    
                    break;
                  }
                } 
               echo '</ul></p>';
            
    }

    protected function showContent()
    {
        echo "<h1>".$this->title."</h1><p>".$this->text."</p>".PHP_EOL;
    }

    protected function showFooter() 
    { 
        echo '<footer> &copy; 2022 Sofie Willemsen </footer>';
    } 

    protected function bodyContent($data)
    {
        $this->showHeader();
        $this->showMenu(); 
        $this->showContent(); 
        $this->showFooter();
    }
}

?>