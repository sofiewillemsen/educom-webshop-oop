<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');
$data = array ('page' => 'home', 'menuItems' => array('home', 'about'), 'content' => 'Dit is mijn home pagina.');
$home = new BasicDoc($data);
$home -> show();

?>