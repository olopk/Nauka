<?php
/**
 * Created by PhpStorm.
 * User: leszekkazmierczak
 * Date: 06.12.2017
 * Time: 16:47
 */
function srednia($cos){
    $suma = 0;
    for($i=0; $i<=count($cos); $i++){
        $suma = $suma + $cos[$i];
    }
    return $suma/count($cos);
}



$tab[] = 32;
$tab[] = 45;
$tab[] = 22;
$tab[] = 21;

var_dump($tab);

//echo srednia($tab);

