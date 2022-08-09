<?php

class PageInfo
{

   public function getData(string $page) {
  
    $data = [];
    
    switch ($page)
    {
      case 'home':
        $data = array
                   (
                    'page' => 'home',
                    'title' => 'home'
                   );
      case 'about':
        $data = array
                    (
                     'page' => 'about',
                     'title' => 'about'
                     );

      case 'contact':
        $data['page'] = 'contact';
        $data['intro'] = 'Voer hier uw contactgegevens in.';
        $data['submitcaption'] = 'Versturen';
        $data['action'] = 'index.php';
        $data['arr_fields'] = array
        (
        'naam'    => array('type' => 'text',    
                  'label'=> 'Naam',
                  'placeholder' => 'Naam',
                  ),    
        'email'   => array('type' => 'email',
                  'label'=> 'Email',
                  'placeholder' => 'Email',
                  ),  
        'telefoon'   => array('type' => 'tel',
                  'label'=> 'Telefoonnummer',
                  'placeholder' => 'Telefoonnummer',
                  ),  
        'contact'   => array('type' => 'select',
                  'label'=> 'Voorkeur voor communicatie per',
                  'contactoptions' => array(
                      'Email' => 'email',
                      'Telefoon' => 'telefoon'),
                  ),        
        'bericht'   => array('type' => 'textarea',
                  'label'=> 'Bericht',
                  'placeholder' => 'Bericht',
                  )   
                );
        break;
      
      case 'login':
        $data = array
                    (
                    'page' => 'login', 
                    'intro' => 'Voor uw email en wachtwoord in om in te loggen.',
                    'submitcaption' => 'Login',
                    'arr_fields' => array
                      (
                      'email'   => array('type' => 'email',
                                'label'=> 'Email',
                                'placeholder' => 'Email',
                                ),  
                      'password'   => array('type' => 'password',
                                'label'=> 'Wachtwoord',
                                'placeholder' => 'Wachtwoord',
                              )   
                      ),
                    'action' => 'index.php'
                    );
        break;

        case 'register':
          $data = array
                    (
                    'page' => 'register', 
                    'intro' => 'Registreer met uw naam, email en wachtwoord.',
                    'submitcaption' => 'Register',
                    'arr_fields' => array
                        (
                          'name'    => array('type' => 'text',    
                                  'label'=> 'Naam',
                                  'placeholder' => 'Naam',
                                  ),    
                          'email'   => array('type' => 'email',
                                  'label'=> 'Email',
                                  'placeholder' => 'Email',
                                  ),  
                          'password'   => array('type' => 'password',
                                  'label'=> 'Wachtwoord',
                                  'placeholder' => 'Wachtwoord',
                                  ),
                          'password2'   => array('type' => 'password',
                                  'label'=> 'Herhaal wachtwoord',
                                  'placeholder' => 'Wachtwoord',
                                  )    
                        ),
                    'action' => 'index.php'
                     );
          break;

        case 'webshop':
          $data = array
          (
          'page' => 'webshop', 
          'intro' => 'Dit is mijn webshop met vintage en tweedehands kleding.'
          );
        break;

      }
      return $data;
    }
}

?>