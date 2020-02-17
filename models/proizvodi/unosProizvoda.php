<?php
//define("FILE_SIZE", 2*1024*1024); //2MB
if(isset($_POST['unosProizvodaDugme'])){
    include "../../config/connection.php";
    include "functions.php";

    $slika=$_FILES['slikaUnos'];
    $slikaVelicina=$slika['size'];
    $slikaTip=$slika['type'];
    $slikaTmp=$slika['tmp_name'];
    $slikaNaziv=$slika['name'];

    $putanjaMalaSlika=radSaSlikom($slikaNaziv, $slikaTmp, $slikaTip, $slikaVelicina, 350, 210, "mala");
    $putanjaVelikaSlika=radSaSlikom($slikaNaziv, $slikaTmp, $slikaTip, $slikaVelicina, 600, 360, "velika");



    $naziv=$_POST['nazivPro'];
    $opis=$_POST['opisUnos'];
    $cena=$_POST['cenaUnos'];
    $kategorija=$_POST['kategorijaIzbor'];

    $errors=[];

    $regCena="/^(([1-9][0-9]*)|(0))(\.\d)?(\d)?$/";

    if(strlen($naziv)==0 || strlen($naziv)>50){
        array_push($errors, "Morate upisati naziv i on ne sme biti veći od 50 karaktera.");
    }
    if(strlen($opis)==0){
        array_push($errors, "Morate upisati opis.");
    }
    if(!preg_match($regCena, $cena)){
        array_push($errors, "Cenu morate uneti kao ceo broj ili kao decimalni broj sa jednim ili dva mesta nakon tacke! Primer: 5 ili 5.3 ili 5.78");
    }
    if($kategorija=="Izaberite..."){
        array_push($errors, "Morate izabrati kategoriju.");
    }


    if(count($errors)==0){
        if($putanjaMalaSlika && $putanjaVelikaSlika){
            $upit=$konekcija->prepare("INSERT INTO proizvod (naziv_proizvoda, opis, cena, slika, mala_slika, id_kategorija) VALUES (?, ?, ?, ?, ?, ?)");

            try {
                $rezultat = $upit->execute([$naziv, $opis, $cena, $putanjaVelikaSlika, $putanjaMalaSlika, $kategorija]);
                header("Location: ../../admin.php");


            } catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
    }
    else{
        foreach ($errors as $error)
            echo $error;
    }

} else {

    }

