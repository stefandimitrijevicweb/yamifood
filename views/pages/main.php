<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <?php
            require_once "models/slajder/functions.php";
            $podaci=dohvatiSlike();

            foreach ($podaci as $podatak): ?>
                <li class="text-center">
                    <img src="assets/images/<?= $podatak->putanja ?>" alt="<?= $podatak->alt ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
                                <p class="m-b-40">See how your users experience your website in realtime or view  <br>
                                    trends to see any changes in performance over time.</p>
                                <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="?page=register">Register</a></p>
                            </div>
                        </div>
                    </div>
                </li>
        <?php endforeach; ?>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
<div class="about-section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="assets/images/about-img.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center align-self-center">
                <div class="inner-column">
                    <h1>Welcome To <span>Yamifood Restaurant</span></h1>
                    <h4>Little Story</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                    <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About -->
