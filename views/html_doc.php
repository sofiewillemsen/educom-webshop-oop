<?php

class HtmlDoc 
        { 
    
        public function __construct(string $title) 
            { 
                $this->title = $title; 
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

        }


?>