<?php

class GetData
{

  public function __construct(){
    $data = array();
  }

   public function contactData() {
    $this->data['page'] = 'contact';
    $this->data['intro'] = 'Voer hier uw contactgegevens in.';
    $this->data['submitcaption'] = 'Versturen';
    $this->data['action'] = 'index.php';
    $this->data['arr_fields'] = array
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
    
    return $data = $this->data;
    
    }
 
  public function loginData() 
  {
    $this->data = array
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
    return $this->data;
  }

  public function registerData()
  {
    $this->data = array
                (
                'page' => 'register', 
                'intro' => 'Registreer met uw naam, email en wachtwoord.',
                'submitcaption' => 'Login',
                'arr_fields' => array
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
                  ),
                'action' => 'index.php'
                );
    return $this->data;
  }

  public function webshopData(){
    $this->data = array
    (
    'page' => 'webshop', 
    'intro' => 'Dit is mijn webshop met vintage en tweedehands kleding.'
    );
    return $this->data;
  }
 
}

?>