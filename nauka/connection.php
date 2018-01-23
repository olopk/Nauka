<?php
error_reporting(2);

class polaczenie {
  private $servername ='localhost';
  private $username ='root';
  private $password ='';
  private $dbname ='nauka';
  private $conn = '';

function __construct(){
  $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

  if ($this->conn->connect_error) {
    die ("Connection refused " . connect_error);
    }
  }

}


class dbOperations {
  private $username = '';
  private $password = '';
  private $email = '';
  private $privatekey = '';
  private dbConn = '';

  function __construct(polaczenie $conn){
    $this->dbConn = $conn;
  }

public function userCheck($username, $password){

}

}


?>
