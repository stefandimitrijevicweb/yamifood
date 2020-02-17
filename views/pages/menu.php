<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Special Menu</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!-- Start Menu -->


<div class="menu-box">
        <?php

        if(isset($_GET['proizvod'])){
            $idProizvod=$_GET['proizvod'];

            $upit="SELECT * FROM proizvod WHERE id_proizvod=$idProizvod";
            $rezultat=$konekcija->query($upit)->fetch();
            ?>
            <div class="container kontejnerZasebno">
            <div class="row">
                <input type="hidden" value="<?= $idProizvod ?>" class="proizvodOcena" />
            </div>

            
            <div class="row">
                <h1 class="nazivProizvodaZasebno"><?= $rezultat->naziv_proizvoda ?></h1>
            </div>
            <div class="row">
                <img width="600" height="360" class="img-responsive" src="assets/images/products/<?= $rezultat->slika ?>">
            </div>
            <div class="row">
                <p class="opisProizvodaZasebno"><?= $rezultat->opis ?></p>
            </div>
    
                    <?php
                    if(isset($_SESSION['korisnik'])){ ?>
                    <div class="row rate">
                        <div>
                            <i class="fa fa-star fa-3x" data-id="0"></i>
                            <i class="fa fa-star fa-3x" data-id="1"></i>
                            <i class="fa fa-star fa-3x" data-id="2"></i>
                            <i class="fa fa-star fa-3x" data-id="3"></i>
                            <i class="fa fa-star fa-3x" data-id="4"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="prosek"></div>
                    </div>
                    <div class="row">
             <a href="index.php?page=menu" class="vrati"><i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i></a>
        </div>
                        
                    </div>
            </div>
            </div>
                    <?php
                } else {

                }
                ?>
            </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 searchPolje">
                        <div class="special-menu text-center">
                            <input class="form-control trazi" type="text" placeholder="Search" aria-label="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group">
                                <button class="buttonKategorija active" data-id="-1">All</button>
                                <?php
                                require_once "models/functions.php";
                                $podaci=dohvati('kategorija');
                                foreach($podaci as $podatak): ?>
<!--                                  data-filter=".//=strtolower($podatak->naziv_kategorije)-->
                                    <button class="buttonKategorija" data-id="<?= $podatak->id_kategorija ?>"><?= $podatak->naziv_kategorije ?></button>

                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nema text-center"></div>
                <div class="row redZaProizvode">
                    <?php
                    require_once "models/stranicenje/functions.php";
                    $podaci=dohvatiPoStranici(3);
                    foreach ($podaci as $podatak):
                        ?>
                        <div class="col-lg-4 col-md-6 special-grid">
                            <div class="gallery-single fix">
                                <img src="assets/images/products/<?= $podatak->mala_slika ?>" class="img-fluid" alt="<?= $podatak->naziv_proizvoda ?>">
                                <a href="index.php?page=menu&proizvod=<?= $podatak ->id_proizvod?>">
                                <div class="why-text detalji">
                                    <h4><?= $podatak->naziv_proizvoda ?></h4>
                                    <h5>$<?= $podatak->cena ?></h5>
                                </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-sm-3 brojeviPaginacija">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <?php
                            $brojLinkova=brojLinkova(3);
                            for($i=0; $i<$brojLinkova; $i++):
                                $index=$i+1;
                                ?>
                                <li class="page-item">
                                    <a id="<?= $i?>" data-id="<?= $index?>" class="page-link stranicenjeBroj" href="#"><?= $index?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- End Menu -->

<!-- Start QT -->
<div class="qt-box qt-background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-left">
                <p class="lead ">
                    " If you're not the one cooking, stay out of the way and compliment the chef. "
                </p>
                <span class="lead">Michael Strahan</span>
            </div>
        </div>
    </div>
</div>
<!-- End QT -->

