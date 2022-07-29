<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');

class ThanksDoc extends BasicDoc
{
    public function __construct($postresult)
    {
        $this->title = 'Bedankt';
        $this->text = 'Uw bericht:';
        $this->arr_postresult = $postresult;
    }

    protected function showContent()
    {
     echo "<h1>".$this->title."</h1><p>".$this->text."</p>".PHP_EOL;
     echo '<table>'.PHP_EOL; 
      foreach (array_slice($this->arr_postresult, 1) as $fieldname => $postresult)
      {
        echo '<tr><td>'
          .$fieldname
          .'</td><td>'
          .$postresult
          .'</td></tr>'
          .PHP_EOL;
     }
     echo '</table>'.PHP_EOL;  
    }
}

?>