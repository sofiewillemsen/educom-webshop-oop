<?php


function showRegisterHeading()
{
  echo '<h1>Registreren</h1><p>Registreer je gegevens:</p>';
}


function getRegisterFields(){

  $registerform_fields = array
  (
    'name'    => array('type' => 'text',    
             'label'=> 'Naam',
             'placeholder' => 'Naam',
            ),    
    'email'   => array('type' => 'email',
             'label'=> 'Email',
             'placeholder' => 'Email',
             'check_func' => 'validEmail'
            ),  
    'password'   => array('type' => 'password',
             'label'=> 'Wachtwoord',
             'placeholder' => 'Wachtwoord',
            ),
    'password2'   => array('type' => 'password',
             'label'=> 'Herhaal wachtwoord',
             'placeholder' => 'Wachtwoord',
            )      
  );

  return $registerform_fields;
}


?>