<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');

class FormsDoc extends BasicDoc
{
  
  public function __construct($data) 
  { 
    $this->page = $data['page'];
    $this->title = $data['page'];
    $this->intro = $data['intro'];
    $this->submitcaption = $data['submitcaption'];
    $this->fields = $data['arr_fields']; 
    $this->action = $data['action'];
    if (isset ($data['postresult'])) {
      $this->postresult = $data['postresult'];
    }else{
      $this->postresult = [];
    }
  } 
  
  protected function showContent()   {
    echo '<h1>'.$this->title.'</h1>
    <p>'.$this->intro.'</p>
    
    <form action="'.$this->action.'" method="POST" >
    <input type="hidden" name="page" value="'.$this->page.'" />'.PHP_EOL;
    
    foreach ($this->fields as $this->fieldname => $this->fieldinfo)
    { 
      if(isset($this->postresult[$this->fieldname]))
      {
        $this->postresult[$this->fieldname] = $this->postresult[$this->fieldname];
      }
      else
      {
        $this->postresult[$this->fieldname] = '';
      }
      echo '<br><label for="'.$this->fieldinfo['label'].'">'.$this->fieldinfo['label'].'</label><br>';
      
      switch ($this->fieldinfo['type'])
      {
        case "textarea" :
          echo '    <textarea name="'
          .$this->fieldname
          .'" placeholder="'
          .$this->fieldinfo['placeholder'].'">'
          .$this->postresult[$this->fieldname]
          .'</textarea>'
          .PHP_EOL;
          break;
          
          case "select" :
            echo '    <select name="'.$this->fieldname.'">'.PHP_EOL;
            if (isset($this->fieldinfo['contactoptions']))
            { 
              $this->options = $this->fieldinfo['contactoptions'];
              if ($this->options)
              {
                foreach ($this->options as $this->key => $this->value)
                {
                  $this->selected = $this->postresult[$this->fieldname]==$this->value ? "selected" : "";
                  echo '<option value="'.$this->value.'" '.$this->selected.'>'.$this->key.'</option>'.PHP_EOL;
                }
              }           
            }
            echo '    </select>'.PHP_EOL;
            break;
            
            default : 
            echo '    <input type="'.$this->fieldinfo['type']
            .'" name="'.$this->fieldname
            .'" placeholder="'.$this->fieldinfo['placeholder'].'"value="' 
            .$this->postresult[$this->fieldname]
            .'" />'.PHP_EOL;
            break;
          }
          if (isset($this->postresult[$this->fieldname.'_err']))
            {
              echo '*'.$this->postresult[$this->fieldname.'_err'].PHP_EOL;
            } 
        }
        
        echo '<br><button type="submit" value="submit">'.$this->submitcaption.'</button><br><br><br>'.PHP_EOL
        .'  </form>'.PHP_EOL;
        
      }
    }
    ?>