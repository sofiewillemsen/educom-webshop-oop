<?php
require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/html_doc.php');

class BasicDoc extends HtmlDoc 
{

    public function __construct($data)
    {
        $this->title = $data['page'];
        $this->menuItems = $data['menuItems'];
        $this->content = $data['content'];
    }

    protected function showHeader() 
    { 
       echo "<header><h1><br>Sofie's Webshop </h1> </header>";
    } 

    protected function showMenu()
    {       
               echo '<p>
               <ul class="nav">';
            
                  foreach ($this->menuItems as $value){
                  echo '<li><a href="index.php?page='.$value.'">'.$value.'</a></li>'.PHP_EOL;
                  }
            
               echo '</ul></p>';
            
    }

    protected function showContent()
    {
        echo "<h1>".$this->title."</h1>
        <p>".$this->content."</p>".PHP_EOL;
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