<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');

class FormsDoc extends BasicDoc
    {

    public function __construct($data) 
        { 
         $this->title = $data['page'];
         $this->intro = $data['intro'];
         $this->submitcaption = $data['submitcaption'];
         $this->fields = $data['arr_fields']; 
         $this->action = $data['action'];
         $this->currentvalue = '';
        } 
    
    protected function showContent(array $arr_postresult = array())   {
            echo '<h1>'.$this->title.'</h1>
            <p>'.$this->intro.'</p>
            
            <form action="'.$this->action.'" method="POST" >'.PHP_EOL;
    
            foreach ($this->fields as $fieldname => $fieldinfo)
            { 
            $this->current_value = (isset($arr_postresult[$fieldname]) ? $arr_postresult[$fieldname] : '');
            echo '<br><label for="'.$fieldinfo['label'].'">'.$fieldinfo['label'].'</label><br>';
            
            switch ($fieldinfo['type'])
            {
              case "textarea" :
                echo '    <textarea name="'
                  .$fieldname
                  .'" placeholder="'
                  .$fieldinfo['placeholder'].'">'
                  .$this->currentvalue
                  .'</textarea>'
                  .PHP_EOL;
                break;
              
              case "select" :
                echo '    <select name="'.$fieldname.'">'.PHP_EOL;
                if (isset($fieldinfo['contactoptions']))
                { 
                  $options = $fieldinfo['contactoptions'];
                  if ($options)
                  {
                    foreach ($options as $key => $value)
                    {
                      $selected = $currentvalue==$value ? "selected" : "";
                      echo '<option value="'.$value.'" '.$selected.'>'.$key.'</option>'.PHP_EOL;
                    }
                  }           
                }
                echo '    </select>'.PHP_EOL;
                break;
        
              default : 
                echo '    <input type="'.$fieldinfo['type']
                  .'" name="'.$fieldinfo['label']
                  .'" placeholder="'.$fieldinfo['placeholder'].'"value="' 
                  .$this->currentvalue
                  .'" />'
                  .PHP_EOL;
                break;
            }
            }
                        
            echo '<br><button type="submit" value="submit">'.$this->submitcaption.'</button><br><br><br>'.PHP_EOL
              .'  </form>'.PHP_EOL;
            
        }
    }