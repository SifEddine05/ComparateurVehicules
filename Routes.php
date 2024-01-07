<?php
    require_once("./Views/Pages/LandingPage.php");
    require_once("./Views/Pages/ComparatorPage.php");
    require_once("./Views/Pages/NewsPage.php");
    require_once("./Views/Pages/NewsDetails.php");
    require_once("./Views/Pages/ContactPage.php");
    require_once("./Views/Pages/SignupPage.php");
    require_once("./Views/Pages/LoginPage.php");
    require_once("./Views/Pages/MarquesPage.php");
    require_once("./Views/Pages/VehiculePage.php");
    require_once("./Views/Pages/AvisPage.php");
    require_once("./Views/Pages/AvisVehiculePage.php");
    require_once("./Views/Pages/FavoritePage.php");
    require_once("./Views/Pages/GuidePage.php");
    require_once("./Views/Pages/GuideInfosPage.php");


    require_once("./Views/AdminPages/LoginAdminPage.php");
    require_once("./Views/AdminPages/HomeAdminPage.php");
    require_once("./Views/AdminPages/MarqueAdminPage.php");
    require_once("./Views/AdminPages/addMarquePage.php");




    







    $request = $_SERVER['REQUEST_URI'];
   
    if ($request[strlen($request) - 1] == '/' && $request != "/ComparateurVehicules/") {
        header("location:" . substr($request, 0, -1));
    };

    if (strpos($request, "?")) {
        $request = substr($request, 0, - (strlen($request) - strpos($request, "?")));
    }

    // if (strpos($request, "/admin")) {
    //     $request = "/ComparateurVehicules/admin";
    // }

    $LandingPage = new LandingPage();
    $ComparatorPage = new ComparatorPage();
    $NewsPage = new NewsPage();
    $NewsDetails = new NewsDetails();
    $ContactPage = new ContactPage();
    $SignupPage = new SignupPage();
    $LoginPage = new LoginPage();
    $MarquePage = new MarquePage();
    $VehiculePage = new VehiculePage();
    $AvisPage = new AvisPage();
    $AvisVehiculePage = new AvisVehiculePage();
    $FavoritePage =new FavoritePage();
    $GuidePage = new GuidePage();
    $GuideInfosPage = new GuideInfosPage();


    $LoginAdminPage = new LoginAdminPage();
    $HomeAdminPage = new HomeAdminPage();
    $MarqueAdminPage = new MarqueAdminPage();
    $addMarquePage = new addMarquePage();




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
        case '/ComparateurVehicules/marque':
            $MarquePage->getPage();
            break;
        case '/ComparateurVehicules/vehicule':
            $VehiculePage->getPage();
            break;
        case '/ComparateurVehicules/avis':
            $AvisPage->getPage();
            break;
        case '/ComparateurVehicules/avisVehicule':
            $AvisVehiculePage->getPage();
            break;
        case '/ComparateurVehicules/favoris':
            $FavoritePage->getPage();
            break;
        case '/ComparateurVehicules/guideachat':
            $GuidePage->getPage();
            break;
        case '/ComparateurVehicules/guide':
            $GuideInfosPage->getPage();
            break;

        
        case '/ComparateurVehicules/admin/login':
            $LoginAdminPage->getPage();
            break;
        
            
        case '/ComparateurVehicules/admin':
            $HomeAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/marques':
            $MarqueAdminPage->getPage();
            break;
        
        case '/ComparateurVehicules/admin/addmarque':
            $addMarquePage->getPage();
            break;

        default:
            printf("Not Found");
            break;

        }
    



?>