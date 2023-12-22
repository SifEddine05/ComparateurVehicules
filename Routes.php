<?php
    require_once("./Views/Pages/LandingPage.php");
    require_once("./Views/Pages/ComparatorPage.php");
    require_once("./Views/Pages/NewsPage.php");
    require_once("./Views/Pages/NewsDetails.php");
    require_once("./Views/Pages/ContactPage.php");
    require_once("./Views/Pages/SignupPage.php");
    require_once("./Views/Pages/LoginPage.php");





    $request = $_SERVER['REQUEST_URI'];
   
    if ($request[strlen($request) - 1] == '/' && $request != "/ComparateurVehicules/") {
        header("location:" . substr($request, 0, -1));
    };

    if (strpos($request, "?")) {
        $request = substr($request, 0, - (strlen($request) - strpos($request, "?")));
    }

    $LandingPage = new LandingPage();
    $ComparatorPage = new ComparatorPage();
    $NewsPage = new NewsPage();
    $NewsDetails = new NewsDetails();
    $ContactPage = new ContactPage();
    $SignupPage = new SignupPage();
    $LoginPage = new LoginPage();



    switch ($request) {

        

        case '/ComparateurVehicules/':
            $LandingPage->getPage();
            break;
        case '/ComparateurVehicules/compare':
            $ComparatorPage->getPage();
            break;
        case '/ComparateurVehicules/news':
            $NewsPage->getPage();
            break;
        case '/ComparateurVehicules/newsdetails':
            $NewsDetails->getPage();
            break;
        case '/ComparateurVehicules/contact':
            $ContactPage->getPage();
            break;
        case '/ComparateurVehicules/signup':
            $SignupPage->getPage();
            break;
        case '/ComparateurVehicules/login':
            $LoginPage->getPage();
            break;

        default:
            printf("Not Found");
            break;

        }
    



?>