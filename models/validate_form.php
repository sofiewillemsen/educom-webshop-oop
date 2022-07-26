<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');

class ValidateForm
    {

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
            $result[$fieldname.'_err'] = $fieldname.' niet juist.';
            }
        return $result;
    }

   public function checkFields(array $arr_fieldinfo) : array
   {
    $result = array('arr_fieldinfo' => $arr_fieldinfo);
    $result['ok'] = true;
    foreach ($arr_fieldinfo as $fieldname => $fieldinfo)
        {
        $check = $this->checkField($fieldname, $fieldinfo);
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

}


?>