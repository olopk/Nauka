<?php
session_start();
include_once('connection.php');

if($_POST['send']=='Zaloguj')
{
  $check = new  dbOperations();
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
        default:
            include_once ('home.php');
    }

    include_once('footer.php');

?>
</div>

</body>
</html>
