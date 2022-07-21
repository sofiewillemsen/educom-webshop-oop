<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/about_doc.php');

$data = array
    (
    'page' => 'About', 
    'menuItems' => array('Home', 'About')
    );

$about = new AboutDoc($data);
$about->show();

?>