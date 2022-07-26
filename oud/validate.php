<?php 


function validEmail(string $value) : bool
{
  return filter_var($value, FILTER_VALIDATE_EMAIL);
}

function checkField(string $fieldname, array $fieldinfo) : array
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
      $result[$fieldname.'_err'] = $fieldinfo['label'].' is verplicht in te vullen.';
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
          $result[$fieldname.'_err'] = $fieldinfo['label'].' is niet correct.';
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
    $result[$fieldname.'_err'] = $fieldname.' niet gevonden.';
  }
  return $result;
}


function checkFields(array $arr_fieldinfo) : array
{
  $result = array('arr_fieldinfo' => $arr_fieldinfo);
  $result['ok'] = true;
  foreach ($arr_fieldinfo as $fieldname => $fieldinfo)
  {
    $check = checkField($fieldname, $fieldinfo);
    if ($check['ok'])
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

function authenticateUser($email, $password){
 $user = findUserByEmail($email);

 if ($user == null) {
  return false;
 }
 if ($user['password']!== $password) {
  return false;
 }

return $user;

}

function checkRegisterUsers($email){
  require_once('data_access_layer.php');
  $user = findUserByEmail($email);
    
    if (isset($user)) {
      return false;
    }
    return true;
}

function checkRegisterPassword($password, $password2){

  if ($password !== $password2){
    return false;
    
  }
  return true;
}


?>
