<?php
/**
 * Created by PhpStorm.
 * User: leszekkazmierczak
 * Date: 06.12.2017
 * Time: 18:28
 */


if($_SESSION['czy_zalogowany'] == false){

    // [przekierwoanie
    header("Location: http://localhost/nauka/index.php");

} else {

    echo '<h2>Bardzo tajne informacje</h2>';
    echo '<h3>Tylko dla zalogowanych </h3>';

}


?>