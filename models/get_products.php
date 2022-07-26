<?php

class GetProducts
{

     private $servername = "localhost";
     private $username = "sofie";
     private $password = "UOIa(27t3rzexDM@";
     private $dbname = "sofies_webshop";
   
     public  function __construct()  
     {  
         $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname); 
         $this->sql =  "SELECT id, name, price, description, picture FROM products";
         $this->result = $this->conn->query($this->sql);
         $this->products = array(); 
     }  
     


    public function getProducts(){
    if ($this->result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($this->result)) {
          $this->products[$row['id']] = $row;
        }
      } else {
      echo "0 results";
      }
      return $this->products;
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
    $conn->close();
    }
}

?>