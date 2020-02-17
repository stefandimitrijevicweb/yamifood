<?php

function dohvatiSlike(){
    global $konekcija;

    $upit="SELECT * FROM slajder_pocetna";
    $rezultat=$konekcija->query($upit);


    return $rezultat;
}
