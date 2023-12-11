<?php
    require_once("./Views/Pages/LandingPage.php");

    $request = $_SERVER['REQUEST_URI'];
   
    if ($request[strlen($request) - 1] == '/' && $request != "/ComparateurVehicules/") {
        header("location:" . substr($request, 0, -1));
    };

    $LandingPage = new LandingPage();

    switch ($request) {

        

        case '/ComparateurVehicules/':
            $LandingPage->getLandingPage();
            break;
        default:
            printf("Not Found");
            break;

        }
    



?>