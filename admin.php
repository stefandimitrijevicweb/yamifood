<?php
session_start();
include "config/connection.php";
include "views/fixed/head.php";
include "views/fixed/header.php";
if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->id_uloga==1) { ?>

    <?php
    $ispis="";
    $ispis="<div class='red'>";
    if(isset($_GET['poruka'])) echo $_GET['poruka'];
    $ispis="</div>";?>
</div>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Admin panel</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <div class="container-fluid admin">
        <div class="brojUlogovanih">
            <?php
            include "models/korisnici/functions.php";
            $broj=brojUlogovanih();
            echo "Broj ulogovanih korisnika: $broj";
            ?>
        </div><br/>
        <form class="adminForma">
            <select class="custom-select ddLista selectpicker">
                <option class="special" selected>Izaberite...</option>
                <option class="special" value="korisnici">Korisnici</option>
                <option class="special" value="proizvodi">Proizvodi</option>
                <option class="special" value="ocene">Ocene proizvoda</option>
            </select>

            <input type="button" class="btn btn-primary btnRegisterLogin dugmeAdmin" value="Prikaži"/>
        </form>
        <div class="ispis">
            <h2>Pristup stranicama</h2>
            <?php
            include "models/admin/pristupSajtu.php";
            ?>
        </div><br/><br/><br/><br/><br/><br/>
        <div class="ispis2">

        </div>
    </div>
<?php }
else{
    include "views/pages/403_404.php";
} include "views/fixed/footer.php";?>