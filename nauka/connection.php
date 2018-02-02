<?php
ini_set('error_reporting', E_ALL);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/vendor/autoload.php';


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
    die($result->conn_eror);
  }
  //else {
  //  echo "udalo sie";
  //}
  if($result->num_rows > 0){
    return true;
  }else{
    return false;
  }}
  public function nickCheck($username){
    $zapytanie = "SELECT idUser FROM usertb WHERE username='".$username."'";
    $result = $this->dbConn->getData($zapytanie);
      if(!$result){
        die($result->conn_eror);
      }
    //else {
    //  echo "udalo sie";
    //}
      if($result->num_rows > 0){
        return true;
      }
      else{
        return false;
      }
    }
  public function userAdd($imie, $nick, $haslo, $email){
    $losowa = md5($imie.$nick);
    $link = '</br><a href="http://localhost/Nauka/nauka/regconf.php?ref=';
    $body = 'Witaj, w celu dokonczenia rejestracji kliknij w ponizszy link'.$link.$losowa.'</br>Jesli to nie Ty sie rejestrowales to zmien hasla do kompa bo ktos Ci robi numer.';
    $zapytanie = "INSERT INTO usertb (username, userpass, name, email, losowy) VALUES ('".$nick."', '".$haslo."', '".$imie."', '".$email."', '".$losowa."')";
    $result = $this->dbConn->getData($zapytanie);
    if(!$result){
      die($result->conn_eror);
    }
    else {

      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 1;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'olekwojas@gmail.com';                 // SMTP username
          $mail->Password = '14siedempP';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('olekwojas@gmail.com');
          $mail->addAddress($email);               // Name is optional
          $mail->addReplyTo('olekwojas@gmail.com');
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Potwierdz rejestracje';
          //$mail->Body    = '';
          //$mail->AltBody = 'Cos poszlo nie tak, odpisz na tego maila aby dac adminowi znac.';
          $mail->MsgHTML($body);
          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
    }

  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}

?>
