<?php

class Crud
{
    protected $conn;
    protected $stmt;
    private $username = "sofie";
    private $password = "UOIa(27t3rzexDM@";

    public function __construct()
    {
    $this->conn = new PDO("mysql:host=localhost;dbname=sofies_webshop", $this->username, $this->password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function isConnected() : bool
    {
        return is_object($this->conn);
    }

   /*
    * Insert a row of values into the database
    *
    @param string $sql the SQL string with for example ':email' for parameters
    @param array  $bindParameters associative array ( 'email' => 'joe@a.b' );
    *
    * @return int the inserted id or 0 if failed
    * @throws PDOException when failed to complete the insert for technical reasons
    */
   public function createRow($sql, $bindParameters)
   {
    var_dump($bindParameters);
    if ($this->_execute($sql,$bindParameters)) 
    {	
        return $this->conn->lastInsertId();
    }	
    return false;
   }

   /*
    * Read a number of rows of values from the database
    *
    * @param string $sql the SQL string with for example ':email' for parameters
    * @param array  $bindParameters associative array ( 'email' => 'joe@a.b' );
    * @param string $keyName indien niet NULL wordt de waarde van de kolom met deze naam 
    *                        gebruikt om de key te vormen in de associative array
    *
    * @return array an (assosiative) array of objects, each of one row in the results
    * @throws PDOException when failed to complete read for technical reasons
    */
  
  
    public function readMultiRows($sql, $bindParameters, $as_object=false)
    {
        if ($this->_execute($sql,$bindParameters)) 
        {	
            return $this->stmt->fetchAll($as_object ? \PDO::FETCH_OBJ : \PDO::FETCH_ASSOC);
        }	
        return false;
    }

   /*
    * Read one row of values from the database
    *
    * @param string $sql the SQL string with for example ':email' for parameters
    * @param array  $bindParameters associative array ( 'email' => 'joe@a.b' );
    *
    * @return NULL|object an object of the row selected or NULL when no rows were found
    * @throws PDOException when failed to complete read for technical reasons
    */
   public function readOneRow($sql, $bindParameters, $as_object=false)   
   {
    if ($this->_execute($sql,$bindParameters)) 
    {	
        return $this->stmt->fetch($as_object ? \PDO::FETCH_OBJ : \PDO::FETCH_ASSOC);
    }				
    return false;
   }

   /*
    * Update a row of values into the database
    *
    * @param string $sql the SQL string with for example ':email' for parameters
    * @param array  $bindParameters associative array ( 'email' => 'joe@a.b' );
    *
    * @throws PDOException when failed to complete the update for technical reasons
    */
   public function updateRow($sql, $bindParameters)
   {
     if ($this->_execute($sql,$bindParameters)) 
        {	
            return $this->stmt->rowCount();
        }	
        return false;
   }

   /*
    * Remove a row from the database
    *
    * @param string $sql the SQL string with for example ':email' for parameters
    * @param array  $bindParameters associative array ( 'email' => 'joe@a.b' );
    *
    * @throws PDOException when failed to complete the delete for technical reasons
    */
   function deleteRows($sql, $bindParameters)
   {
        if ($this->_execute($sql,$bindParameters)) 
        {	
          return $this->stmt->rowCount();
        }	
        return false;
   }


public function _execute(string $sql, array $bindParameters) : bool
    {
        try
        {
            $this->stmt = $this->conn->prepare($sql);
            foreach ($bindParameters as $name => $info) 
            {
                var_dump($name, $info);
                $this->stmt->bindValue(":".$name, $info[0], 
                $info[1] == \PDO::PARAM_INT ? \PDO::PARAM_INT : \PDO::PARAM_STR);
            }
            return $this->stmt->execute();
        }    
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
          }
    }	
}
?>