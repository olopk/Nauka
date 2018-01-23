<?php
/**
 * Created by PhpStorm.
 * User: leszekkazmierczak
 * Date: 15.11.2017
 * Time: 16:56
 */


class Osoba{

    public $imie='';
    public $nazwisko='';
    public $pesel;

    public function get_name()
    {
        echo 'Imię to: '.$this->imie;
        echo 'Nazwisko to: '.$this->nazwisko;
    }

}

class Pracownik extends Osoba{

    public $wynagrodzenie;

    public function get_income()
    {
        echo 'Zarobki: '.$this->wynagrodzenie;
    }
}

$olek = new Pracownik();
$olek->imie='Aleksander';
$olek->nazwisko='Wojas';
$olek->wynagrodzenie='30000';

$olek->get_name();

$olek->get_income();
