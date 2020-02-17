<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';
if(isset($_POST['email']) && isset($_POST['password'])) {

    require_once "../../config/connection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $kriptovaniPassword = md5($password);

    $regPassword = "/^[A-z0-9]{5,}$/";

    $greske = [];

    if(!$email){
        array_push($greske, "Polje za email je obavezno!");
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($greske, "Email nije dobar");
    }

    if (!$password) {
        array_push($greske, "Polje za lozinku je obavezno!");
    } elseif (!preg_match($regPassword, $password)) {
        array_push($greske, "Polje za lozinku nije dobro popunjeno");
    }

    if (count($greske) == 0) {
        try{
            require_once "../korisnici/functions.php";
            $korisnik = dohvatiKorisnikaPoEmail($email);
            if(!$korisnik) response(404, "Korisnik nije pronadjen.");
            if($korisnik->password == $kriptovaniPassword){
                $_SESSION['korisnik'] = $korisnik;
                $id=$_SESSION['korisnik']->id_korisnik;
                $upit=$konekcija->query("UPDATE korisnik SET ulogovan=1 WHERE id_korisnik=$id");
                response(204, "");
            }
            else{
                if($korisnik->email==$email) {
                    $mejl = $korisnik->email;
                    $ime = $korisnik->ime;

                    $mail = new PHPMailer(true);                    // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'stefanphpmailer@gmail.com';        // SMTP username
                        $mail->Password = 'st3fanphpma1l3r';                  // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom('stefanphpmailer@gmail.com', 'Yamifood Restaurant');
                        $mail->addAddress($mejl, $ime);     // Add a recipient

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Alert';
                        $mail->Body = "Someone just tried to login into your account from IP address: " . $_SERVER['REMOTE_ADDR'] . "! Was that you?";
                        $mail->AltBody = 'Someone just tried to login into your account! Was that you?';

                        $mail->send();
                    } catch (Exception $e) {
                        return false;
                    }
                    response(409, "Pogresna lozinka");
                }
            }
        }catch (PDOException $e) {

            response(500, $e->getMessage());
        }
    }
    else{
        response(422, "");
    }
}
else{
    response(400, "");
}

