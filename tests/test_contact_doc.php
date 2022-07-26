<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');


$data = array
(
'page' => 'Contact', 
'menuItems' => array('Home', 'About', 'Contact'), 
'intro' => 'Voer hieronder uw contactgegevens in.',
'submitcaption' => 'Versturen',
'arr_fields' => array
  (
   'naam'    => array('type' => 'text',    
             'label'=> 'Naam',
             'placeholder' => 'Naam',
            ),    
   'email'   => array('type' => 'email',
             'label'=> 'Email',
             'placeholder' => 'Email',
            ),  
   'phone'   => array('type' => 'tel',
             'label'=> 'Telefoonnummer',
             'placeholder' => 'Telefoonnummer',
            ),  
   'contact'   => array('type' => 'select',
             'label'=> 'Voorkeur voor communicatie per',
             'contactoptions' => array(
                'Email' => 'email',
                'Telefoon' => 'telefoon'),
            ),        
   'message'   => array('type' => 'textarea',
             'label'=> 'Bericht',
             'placeholder' => 'Bericht',
            )   
  ),
'action' => 'test_contact_doc.php'
);
$contact = new FormsDoc($data);
$contact->show();

if ($_SERVER['REQUEST_METHOD']=='POST')
    {
    require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/validate_form.php');
    $validatecontact = new ValidateForm($data);
    $validatecontact->checkFields($data['arr_fields']);
    $result = $validatecontact->checkFields($data['arr_fields']);
           if ($result['ok'])
            { 
            echo 'Bedankt voor uw bericht!';
            }
    }

?>