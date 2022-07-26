<?php

class GetData
{

  public function __construct(){
    $data = array();
  }

   public function contactData() {
    $this->data['page'] = 'Contact';
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
            );
    
    return $this->data;
    
    }
 
  public function loginData() 
  {
    $this->data = array
                (
                'page' => 'Login', 
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
                'page' => 'Register', 
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
    'page' => 'Webshop', 
    'intro' => 'Dit is mijn webshop met vintage en tweedehands kleding.'
    );
    return $this->data;
  }
 
}

?>