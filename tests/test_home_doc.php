<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/home_doc.php');

$data = array
    (
    'page' => 'Home', 
    'menuItems' => array('Home', 'About'), 
    );

$home = new HomeDoc($data);
$home->show();

?>