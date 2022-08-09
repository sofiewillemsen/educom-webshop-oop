<?php

class UserModel
{
    function findUserByEmail($email){
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');
   
        $sql = "SELECT id, name, email, password FROM users WHERE email='".$email."'";
        $crud = new Crud;
        $user = $crud->readOneRow($sql, []);
        return $user;   
      }


      function authenticateUser($email, $password)
      {
       $user = $this->findUserByEmail($email);
   
           if ($user == null) 
           {
           return false;
           }
           if ($user['password']!== $password) 
           {
           return false;
           }
   
       return $user;
   
       }   
  
      
      public function checkRegisterUsers($email)
      {
          $user = $this->findUserByEmail($email);
            
            if ($user != NULL) {
              return false;
            }
            return true;
      }
        
      public function checkRegisterPassword($password, $password2){
        
          if ($password !== $password2){
            return false;
            
          }
          return true;
        }
        
        
    
      public function writeUser($name, $email, $password)
      {
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/crud.php');
        $crud = new Crud();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $crud->createRow($sql, array(
            'name' => [$name, PDO::PARAM_STR],
            'email' => [$email, PDO::PARAM_STR], 
            'password' => [$password, PDO::PARAM_STR]
            )
        );
      }    

}

?>