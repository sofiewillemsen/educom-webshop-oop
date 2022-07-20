<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/html_doc.php');

class HomePage extends HtmlDoc 
    {
    protected function bodyContent($title)  
    {  
        echo "<h1>".$title."</h1>
        <p>Dit is mijn eerste website. Ik ben Sofie en ik leer programmeren.</p>".PHP_EOL;
    } 
    }

$home = new HomePage('Home');
$home -> show();

?>