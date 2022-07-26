<?php

// Vind user via email

function findUserByEmail($email){

    $servername = "localhost";
    $username = "sofie";
    $password = "UOIa(27t3rzexDM@";
    $dbname = "sofies_webshop";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT id, name, email, password FROM users WHERE email='".$email."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      $user['id'] = $row['id'];
      $user['name'] = $row['name'];
      $user ['password'] = $row['password'];
      $user['email'] = $row['email'];
    }
    }else{
      $user = NULL;
  } 
  return $user;
  mysqli_close($conn);
  
  }
  
// Schrijf user naar de DB

function writeUser($name, $email, $password){

    $servername = "localhost";
    $username = "sofie";
    $password_db = "UOIa(27t3rzexDM@";
    $dbname = "sofies_webshop";
  
    $conn = new mysqli($servername, $username, $password_db, $dbname);
  
    $name = mysqli_real_escape_string($conn, $name);

    $sql = "INSERT INTO users (name, email, password)
      VALUES ('".$name."', '".$email."', '".$password."')";
  
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
  $conn->close();
  }

  // Haal producten uit DB

  function getProducts(){
    $servername = "localhost";
    $username = "sofie";
    $password = "UOIa(27t3rzexDM@";
    $dbname = "sofies_webshop";
  
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    $sql =  "SELECT id, name, price, description, picture FROM products";
    $result = $conn->query($sql);
    $products = array();
  
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $products[$row['id']] = $row;
        }
      } else {
      echo "0 results";
      }
      return $products;
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
  $conn->close();
  }

  //Creëer een uniek ordernummer

function createOrderNumber(){
    $servername = "localhost";
    $username = "sofie";
    $password = "UOIa(27t3rzexDM@";
    $dbname = "sofies_webshop";
  
    $year = date("Y");
    $number = 10001;
    $firstOrderNumber = $year.$number;

    $conn = new mysqli($servername, $username, $password, $dbname);
  
    $sql =  "SELECT max(ordernumber) FROM orders";
    $result = $conn->query($sql);
    
    if ($result !== NULL) {
        $result = mysqli_fetch_assoc($result);
        $maxOrderNumber = $result['max(ordernumber)'];
        
        if (substr($maxOrderNumber, 0, 4) == $year)
        {
        $orderNumber = $maxOrderNumber+1;
        }
        else
        {
        $orderNumber = $firstOrderNumber;
        }
    }
    else
    {
    $orderNumber = $firstOrderNumber;
    }

    return $orderNumber;
    
 
   if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
  $conn->close();
}

// Schrijf de productid, het ordernummer en de hoeveelheid naar de database

function writeToOrdersRegel(){
    
    foreach ($_SESSION['cart_products'] as $product){
       $ordernumber = $_SESSION['ordernumber'];
       $productid = $product['id'];
       $amount = '1';
   
       $servername = "localhost";
       $username = "sofie";
       $password = "UOIa(27t3rzexDM@";
       $dbname = "sofies_webshop";
   
       $conn = new mysqli($servername, $username, $password, $dbname);
           
       $sql =  "INSERT INTO orders_regel (productid, ordernumber, amount) VALUES (".$productid.", ".$ordernumber.", ".$amount.")";
   
       if ($conn->query($sql) === FALSE) {
           echo "Error: " . $sql . "<br>" . $conn->error;
           }
           
           $conn->close();
       }
   
   }
   
   // Schrijf het ordernummer, de datum en het userid naar de database
   
   function writeToOrders(){
       $servername = "localhost";
       $username = "sofie";
       $password = "UOIa(27t3rzexDM@";
       $dbname = "sofies_webshop";
          
       $ordernumber = $_SESSION['ordernumber'];
       $date = date("dmY");
       $userid = $_SESSION['userid'];
   
       $conn = new mysqli($servername, $username, $password, $dbname);
       
       $sql =  "INSERT INTO orders (ordernumber, date, userid) VALUES (".$ordernumber.", ".$date.", ".$userid.")";
   
   
       if ($conn->query($sql) === FALSE) {
       echo "Error: " . $sql . "<br>" . $conn->error;
       }
       
       $conn->close();
       };

?>