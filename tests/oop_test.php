<?php
class Menu 
    {

    public array $menuItems;
    
    public function menuStart() {
     echo '<p>
       <ul class="nav">';
    }
    
    public function menuItems($menuItems) {
    foreach ($menuItems as $value){
          echo '<li><a href="index.php?page='.$value.'">'.$value.'</a></li>'.PHP_EOL;;
          }
    }

    public function menuEnd() {
       echo '</ul></p>';
    }

    public function showMenu($menuItems) {
        $this->menuStart();
        $this->menuItems($menuItems);
        $this->menuEnd();
    }

    }

 $menuItems =  array ('home', 'about', 'login');
 $menu = new Menu;
 $menu -> showMenu($menuItems);
    

 
class htmlDoc 
        { 
    
        public function __construct(string $title) 
            { 
                $this->title = $title; 
            } 

        public function show() 
            { 
                $this->beginDoc(); 
                $this->beginHead(); 
                $this->headContent($this->title); 
                $this->endHead(); 
                $this->beginBody(); 
                $this->bodyContent($this->title); 
                $this->endBody(); 
                $this->endDoc(); 
            }     

        private   function beginDoc()      {
            echo "<!DOCTYPE html><html>";   } 
        private   function beginHead()   {
            echo "<head>"; } 
        protected function headContent() {
            echo "<title>".$this->title."</title>"; } 
        private   function endHead()     {
            echo "</head>"; } 
        private   function beginBody()     {
            echo "<body>";  } 
        protected function bodyContent($title)   {
            echo "<h1>".$title."</h1>" ;  } 
        private   function endBody()       {
            echo "</body>";   } 
        private   function endDoc()        {
            echo "</html>"; } 
        
        }

class HomePage extends HtmlDoc 
    {
    protected function bodyContent($title)  
    {  
        echo "<h1>".$title."</h1>
        <p>Dit is mijn eerste website. Ik ben Sofie en ik leer programmeren.</p>".PHP_EOL;
    } 
    }

class Form
    {
    
    protected $submit_caption;
    protected $fields;

    protected function openForm()
    {
        echo '<form action="oop_test.php" method="POST" >'.PHP_EOL;
    }

    protected function closeForm(string $submit_caption="Versturen")
    {
     echo '    <br><button type="submit" value="submit">'.$submit_caption.'</button><br><br><br>'.PHP_EOL
    .'  </form>'.PHP_EOL;
    }

    function showFields($fields)
    {
    foreach ($fields as $field)
    { 
    echo '<br><label for="'.$field.'">'.$field.'</label>
          <input type="'.$field
          .'" name="'.$field
          .'" placeholder="'.$field.'"value="' 
          .$field
          .'" />'
          .PHP_EOL;
        }
        }

    function showForm($fields) {

        $this->openForm();
        $this->showFields($fields);
        $this->closeForm();

    }

    }

$home = new HomePage('Home');
$home -> show();

$contact = new HomePage('Contact');
$contact -> show();
$contactform = new Form();
$fields = array ('naam', 'email', 'telefoon');
$contactform -> showForm(array ('naam', 'email', 'telefoon'));



?>