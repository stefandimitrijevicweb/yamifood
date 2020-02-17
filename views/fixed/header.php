<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <?php
                    require_once "models/meni/functions.php";
                    if(isset($_SESSION['korisnik'])){
                        $podaci=dohvatiMeni(1, $_SESSION['korisnik']->id_uloga);
                    }
                    else{
                        $podaci=dohvatiMeni(1, 3);
                    }

                    foreach ($podaci as $podatak): ?>
                        <li class="nav-item <?php if(strtolower($_GET['page'])== strtolower($podatak->naziv)) echo "active"?>"><a class="nav-link" href="<?= $podatak->putanja ?>"><?= $podatak->naziv ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
