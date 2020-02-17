<?php
function proveriKorisnik($email){
    global $konekcija;

    $upit="SELECT * FROM korisnik WHERE email=?";
    $priprema=$konekcija->prepare($upit);
    $priprema->execute([$email]);

    return $priprema;
}
?>
