<?php
session_start();
include_once('connection.php');

if($_POST['send']=='Zaloguj')
{
  $polaczeni = new polaczenie();
  $check = new dbOperations($polaczeni);
  $wynik = $check->userCheck($_POST['login'], $_POST['pass']);

    if($wynik == true)
    {
        echo '<div class="alert alert-success">Witaj admin.</div>';
        $_SESSION['czy_zalogowany'] = true;
    }
    else
    {
        echo '<div class="alert alert-danger">Podałeś zły login lub hasło.</div>';
    }
}
if($_GET['alert']=='logout')
{
  echo '<div class="alert alert-danger">Żegnaj</div>';
}

if($_POST['send']=='rejestruj')
{
  $_SESSION['FLAGA'] = true;
  if(!isset($_POST['imie'])){
    $_SESSION['e_imie'] = 'Imie jest wymagane';
    $_SESSION['FLAGA'] = false;
  }
  else {
    if((strlen($_POST['imie']) < 3) || (strlen($_POST['imie']) > 16)){
      $_SESSION['e_imie'] = 'imie powinno miec nie mniej niz 3 i nie wiecej niz 16 znakow';
      $_SESSION['FLAGA'] = false;
    }
  }
  if(!isset($_POST['email'])){
    $_SESSION['e_email'] = 'adres email jest wymagany';
    $_SESSION['FLAGA'] = false;
  }
  else {
    $email = test_input($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $_SESSION['e_email'] = 'Email nie spelnia kryteriow ogórku';
      $_SESSION['FLAGA'] = false;
    }
  }
  if(empty($_POST['nick'])){
    $_SESSION['e_nick'] = 'Nick jest wymagany';
    $_SESSION['FLAGA'] = false;
  }
  else {
    $polaczeni = new polaczenie();
    $check = new dbOperations($polaczeni);
    $nickCheck = $check->nickCheck($_POST['nick']);
    if($nickCheck){
      $_SESSION['e_nick'] = 'Wybrany nick jest zajety, sprobuj czegos innego';
      $_SESSION['FLAGA'] = false;
    }
  }
  if(empty($_POST['pass1'])){
    $_SESSION['e_pass1'] = 'Haslo musi zawierac conajmniej 1 znak';
    $_SESSION['FLAGA'] = false;
  }
  else {
    if(empty($_POST['pass2'])){
      $_SESSION['e_pass2'] = 'Powtorz haslo';
      $_SESSION['FLAGA'] = false;
    }
    else {
      $checkPass = test_input($_POST['pass1']);
      if(!$checkPass){
        $_SESSION['e_pass1'] = 'Podane haslo zawiera zabronione znaki';
        $_SESSION['FLAGA'] = false;
      }
      else {
        if($_POST['pass1'] !== $_POST['pass2']){
            $_SESSION['e_pass2'] = 'Powtorzone haslo nie zgadza sie z tym wyzej';
            $_SESSION['FLAGA'] = false;
        }
      }
    }
  }

  if(!isset($_POST['pudelko'])){
    $_SESSION['e_pudelko'] = 'Zaznacz, ze akceptujesz regulamin';
    $_SESSION['FLAGA'] = false;
  }

  if($_SESSION['FLAGA'] == true){
    $polaczenie = new polaczenie();
    $obiekt = new dbOperations($polaczenie);
    $dodajUsera = $obiekt->userAdd($_POST['imie'], $_POST['nick'], $_POST['pass1'], $_POST['email']);

    

  }
    else {
      echo 'nie udalo sie';
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nauka PHP</title>

</head>
<body>


<div class="container">
<?php

    include_once('header.php');

    switch ($_GET['strona']){
        case 'kontakt':
            include_once ('contact.php');
            break;
        case 'logowanie':
            include_once ('login.php');
            break;
        case 'wylogowanie':
            include_once ('logout.php');
            break;
        case 'restricted':
            include_once ('restricted.php');
            break;
        case 'rejestracja':
            include_once ('register.php');
            break;
        default:
            include_once ('home.php');
    }

    include_once('footer.php');

?>
</div>

</body>
</html>
