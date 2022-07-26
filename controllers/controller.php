<?php

class Controller 
 { 
     private $request; 
     private $response; 
      
     public function handleRequest() 
     { 
         $this->getRequest(); 
         $this->validateRequest(); 
         $this->showResponse(); 
     } 
      
     private function getRequest() 
     { 
         $posted = ($_SERVER['REQUEST_METHOD']==='POST'); 
         $this->request =  
             [ 
                 'posted' => $posted, 
                 'page'   => $this->getRequestVar('page', $posted, 'home')     
             ]; 
     } 
      
     private function validateRequest() 
     { 
         $this->response = $this->request; // getoond == gevraagd 
         if ($this->request['posted']) 
         { 
             switch ($this->request['page']) 
             { 
                case 'contact':
                    // Dit werkt nog niet
                    require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/validate_form.php');
                    $validatecontact = new ValidateForm;
                    $result = $validatecontact->checkFields($data['arr_fields']);
                    if ($result['ok'])
                    { 
                        echo 'Bedankt voor uw bericht!';
                    }
                    else
                    {
                        $this->response['page'] = 'contact';
                    }
                break;
             } 
         } 
         else 
         { 
             switch ($this->request['page']) 
             { 
                case 'Home':
                    $this->response['page'] = 'home';
                break;
                case 'About':
                    $this->response['page'] = 'about';
                break;
                case 'Contact':
                    $this->response['page'] = 'contact';
                break;
                case 'Login':
                    $this->response['page'] = 'login';
                break;
                case 'Register':
                    $this->response['page'] = 'register';
                break;
                case 'Webshop':
                    $this->response['page'] = 'webshop';
                break;
                case 'detail':
                    $this->response['page'] = 'detail';
                break;
                default:
                    $this->response['page'] = 'home';
                break;
             } 
         } 
     } 
      
     private function showResponse() 
     { 
         switch ($this->response['page']) 
         { 
            case 'home':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/home_doc.php');
                $data = array
                   (
                    'page' => 'Home'
                   );
                $home = new HomeDoc($data);
                $home->show();
            break;
            case 'about':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/about_doc.php');
                $data = array
                    (
                     'page' => 'About' 
                     );
                $about = new AboutDoc($data);
                $about->show(); 
            break;
            case 'contact':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $contactdata = new GetData();
                $data = $contactdata->contactData();
                $contact = new FormsDoc($data);
                $contact->show();
            break;
            case 'login':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $logindata = new GetData();
                $data = $logindata->loginData();
                $login = new FormsDoc($data);
                $login->show();
            break;
            case 'register':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $registerdata = new GetData();
                $data = $registerdata->registerData();
                $register = new FormsDoc($data);
                $register->show();
            break;
            case 'webshop':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/products_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $webshopdata = new GetData();
                $data = $webshopdata->webshopData();
                $webshop = new ProductsDoc($data);
                $webshop->show();
            break;
            case 'detail':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/detail_doc.php');
                $data['page'] = 'detail';
                $detail = new DetailDoc('data');
                $detail->show();
            break;
         } 
     } 
      
     private function getRequestVar(string $key, bool $frompost, $default="", bool $asnumber=FALSE)
     { 
         $filter = $asnumber ? FILTER_SANITIZE_NUMBER_FLOAT : FILTER_SANITIZE_STRING;
         $result = filter_input(($frompost ? INPUT_POST : INPUT_GET), $key, $filter);
         return ($result===FALSE) ? $default : $result; 
     }   
 } 

  

?>