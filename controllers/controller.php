<?php

class Controller 
 { 

     private $request; 
     private $response; 
      
     public function handleRequest() 
     { 
        session_start();
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
         $this->response = $this->request; 
         if ($this->request['posted']) 
        
         { 
          switch ($this->request['page']) 
            { 
               case 'contact':
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/validate.php');
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                 $dataByPage = new GetData();
                 $this->response['data'] = $dataByPage->getData('contact');
                 $validateContact = new ValidateForm();
                 $this->response['data']['postresult'] = $validateContact->checkFields($this->response['data']['arr_fields']);
                 if ($this->response['data']['postresult']['ok'])
                 {
                    $this->response['page'] = 'thanks';
                 }
                break;

                case 'login':
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/validate.php');
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
                 require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                 $dataByPage = new GetData();
                 $this->response['data'] = $dataByPage->getData('login');
                 $validateLogin = new ValidateForm();
                 $this->response['data']['postresult'] = $validateLogin->checkFields($this->response['data']['arr_fields']);
                 $authenticatedUser = $validateLogin->authenticateUser
                    (
                    $this->response['data']['postresult']['email'], 
                    $this->response['data']['postresult']['password']
                    );
                 if ($this->response['data']['postresult']['ok'])
                  { 
                      if (findUserByEmail($this->response['data']['postresult']['email']) ==  false)
                      {
                       $this->response['data']['postresult']['email_err'] = ' Email niet bekend.';
                      }
                     elseif ($authenticatedUser == false) 
                     {
                       $this->response['data']['postresult']['password_err'] = 'Voer het juiste wachtwoord in.';
                     }
                     else
                     {
                        $_SESSION['username'] = $authenticatedUser['name'];
                        $_SESSION['userid'] = $authenticatedUser['id'];
                        $this->response['page'] = 'home';
                     }
                 }
                 break;
                
                case 'register':
                 
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/oud/data_access_layer.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/validate.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $dataByPage = new GetData();
                $this->response['data'] = $dataByPage->getData('register');
                $validateRegister = new ValidateForm();
                $this->response['data']['postresult'] = $validateRegister->checkFields($this->response['data']['arr_fields']);
                if ($this->response['data']['postresult']['ok'])
                {
                    if ($validateRegister->checkRegisterUsers($this->response['data']['postresult']['email']) == false)
                    {
                        $this->response['data']['postresult']['email_err'] = 'Uw emailadres is al geregistreerd. Log <a href="index.php?page=login"> hier </a> in'.PHP_EOL;
                    }
                    elseif($validateRegister->checkRegisterPassword(
                        $this->response['data']['postresult']['password'], 
                        $this->response['data']['postresult']['password2']
                        ) 
                        == false)
                    {
                        $this->response['data']['postresult']['password_err'] = 'Wachtwoorden zijn niet hetzelfde';
                    }
                    else
                    {
                        writeUser(
                            $this->response['data']['postresult']['name'], 
                            $this->response['data']['postresult']['email'], 
                            $this->response['data']['postresult']['password']
                        );
                        $this->response['page'] = 'login';
                    }
                }
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
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $databypage = new GetData();
                $this->response['data'] = $databypage->getData('home');
                $home = new HomeDoc($this->response['data']);
                $home->show();
            break;
            case 'about':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/about_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $databypage = new GetData();
                $this->response['data'] = $databypage->getData($this->request['page']);
                $about = new AboutDoc($this->response['data']);
                $about->show(); 
            break;
            case 'contact':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                if (isset($this->response['data']['postresult']))
                {
                    $contact = new FormsDoc($this->response['data']);
                    $contact->show();
                }
                else
                {
                    $databypage = new GetData();
                    $this->response['data'] = $databypage->getData($this->request['page']);
                    $contact = new FormsDoc($this->response['data']);
                    $contact->show();
                }
            break;
            case 'thanks':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/thanks_doc.php');
                var_dump($this->response['data']['postresult']);
                $thanks = new ThanksDoc($this->response['data']['postresult']);
                $thanks->show();
            break;
            case 'login':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                if (isset($this->response['data']['postresult']))
                {
                    $login = new FormsDoc($this->response['data']);
                    $login->show();
                }
                else
                {
                    $databypage = new GetData();
                    $this->response['data'] = $databypage->getData($this->request['page']);
                    $login = new FormsDoc($this->response['data']);
                    $login->show();
                }
            break;
            case 'register':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/forms_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                if (isset($this->response['data']['postresult']))
                {
                    $register = new FormsDoc($this->response['data']);
                    $register->show();
                }
                else
                {
                    $databypage = new GetData();
                    $this->response['data'] = $databypage->getData($this->request['page']);
                    $register = new FormsDoc($this->response['data']);
                    $register->show();
                }
            break;
            case 'webshop':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/products_doc.php');
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/models/get_page_info.php');
                $databypage = new GetData();
                $this->response['data'] = $databypage->getData($this->request['page']);
                $webshop = new ProductsDoc($this->response['data']);
                $webshop->show();
            break;
            case 'detail':
                require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/detail_doc.php');
                $data['page'] = 'detail';
                $detail = new DetailDoc();
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