<?php
ini_set('error_reporting', E_ALL);

class polaczenie {
  private $servername ='localhost';
  private $username ='root';
  private $password ='';
  private $dbname ='nauka';
  public $conn = '';

function __construct(){
  $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

  if ($this->conn->connect_error) {
    die ("Connection refused " . connect_error);
    }
  }

public function getData($sql){
           return $this->conn->query($sql);
       }

}


class dbOperations {
  private $username = '';
  private $password = '';
  private $email = '';
  private $privatekey = '';
  private $dbConn = '';

  function __construct(polaczenie $conn){
    $this->dbConn = $conn;
  }

public function userCheck($username, $password){
  $zapytanie = "SELECT idUser FROM usertb WHERE username='".$username."' and userpass='".$password."'";
  $result = $this->dbConn->getData($zapytanie);
  if(!$result){
    die("mysqli_error");
  }
  else {
    echo "udalo sie";
  }
  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  }

}

}


?>
