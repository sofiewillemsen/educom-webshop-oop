<?php

class ValidateForm
    {

   public function checkFields($arr_fieldinfo)
   {
    $result = array();
    $result['ok'] = true;
    foreach ($arr_fieldinfo as $fieldname => $fieldinfo)
        {
        $check = $this->checkField($fieldname, $fieldinfo);
        if ($check['ok'] == true)
            {
            $result[$fieldname] = $check[$fieldname];
            } 
            else
            {
            $result['ok'] = false;
            $result[$fieldname.'_err'] = $check[$fieldname.'_err'];
            }     
        }
    return $result;
   }


   public function checkField (string $fieldname, array $fieldinfo) : array
   {
       $result = array();
       $result['ok'] = false;
       if (isset($_POST[$fieldname]))
           {
        $value = $_POST[$fieldname];
        $value = trim($value); 
        $value = stripslashes($value); 
        $value = htmlspecialchars($value); 
        $result[$fieldname] = $value;
             if (empty($value))
               {
                $result[$fieldname.'_err'] = $fieldname.' is verplicht in te vullen.';
               }
               else
               {
                   if (isset($fieldinfo['check_func']) && !empty($fieldinfo['check_func']))
                    {
                    $valid = call_user_func($fieldinfo['check_func'], $value);
                    if ($valid)
                       {
                       $result['ok'] = true;
                       }
                       else
                       {
                       $result[$fieldname.'_err'] = $fieldname.' is niet correct.';
                       }     
                   }   
                   else
                   { 
                    $result['ok'] = true;
                   } 
               } 
           }
           else
           {
           $result[$fieldname.'_err'] = $fieldname.' is verplicht in te vullen.';
           }
       return $result;
   }

   function authenticateUser($email, $password)
    {
     require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
     $user = findUserByEmail($email);
 
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
        require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
        $user = findUserByEmail($email);
          
          if (isset($user)) {
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

}
?>