<?php
if(!isset($_SESSION['korisnik'])){ ?>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Reservation -->
    <div class="reservation-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form>
                            <div class="col-md-12 registerLoginForme">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email address" onblur="proveriEmail()">
                                    <h4 class="regularniFalse">Please, enter a valid email address.</h4>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onblur="proveriPassword()">
                                    <h4 class="regularniFalse">Please, enter a valid password with minimum 5 characters.</h4>
                                </div>
                                <input type="button" class="btn form-group btn-primary btnRegisterLogin " value="Submit" id="ulogujSe" name="ulogujSe"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reservation -->
<?php }
else{ ?>
    <!-- Start All Pages -->
<div class="all-page-title page-breadcrumb zabranaLoginRegister">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>You're already logged in</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->
<?php } ?>
