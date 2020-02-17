<!-- Start Footer -->
<footer class="footer-area bg-f">
    <div class="copyright">
        <div class="container">
            <div class="row futerLinkovi">
                <?php
                require_once "models/meni/functions.php";

                if(isset($_SESSION['korisnik'])){
                    $podaci=dohvatiMeni(2, $_SESSION['korisnik']->id_uloga);
                }
                else{
                    $podaci=dohvatiMeni(2, 3);
                }

                foreach ($podaci as $podatak): ?>
                    <div class="col-lg-2 col-md-6">
                        <p class="lead"><a href="<?= $podatak->putanja ?>"><?= $podatak->naziv ?></a></p>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-12">
                    <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Yamifood Restaurant</a> Design By :
                        <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="assets/js/jquery.superslides.min.js"></script>
<script src="assets/js/images-loded.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/baguetteBox.min.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
