<?php
session_start();
require_once "config/connection.php";

include "views/fixed/head.php";
include "views/fixed/header.php";

if(isset($_GET["page"])){
    $page=$_GET["page"];

    switch($page){
        case "home":
            include "views/pages/main.php";
            break;
        case "menu":
            include "views/pages/menu.php";
            break;
        case "register":
            include "views/pages/register.php";
            break;
        case "login":
            include "views/pages/login.php";
            break;
        case "aboutme":
            include "views/pages/oMeni.php";
            break;
        case "403_404":
            include "views/pages/403_404.php";
            break;
        case "404_404":
            include "views/pages/403_404.php";
            break;
        default:
            include "views/pages/main.php";
            break;
    }
}
else{
    include "views/pages/main.php";
}

include "views/fixed/footer.php";
?>
