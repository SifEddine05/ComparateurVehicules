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
    require_once("./Views/AdminPages/EditMarquePage.php");
    require_once("./Views/AdminPages/VehiculeAdminPage.php");
    require_once("./Views/AdminPages/AddVehiculePage.php");
    require_once("./Views/AdminPages/EditVehiculePage.php");
    require_once("./Views/AdminPages/AvisAdminPage.php");
    require_once("./Views/AdminPages/NewsAdminPage.php");
    require_once("./Views/AdminPages/AddNewsPage.php");
    require_once("./Views/AdminPages/EditNewsPage.php");
    require_once("./Views/AdminPages/UserAdminPage.php");
    require_once("./Views/AdminPages/ParamsAdminPage.php");
    require_once("./Views/AdminPages/GuideAdminPage.php");
    require_once("./Views/AdminPages/AddGuidePage.php");
    require_once("./Views/AdminPages/EditGuidePage.php");
    require_once("./Views/AdminPages/ContactAdminPage.php");
    require_once("./Views/AdminPages/AddContactPage.php");
    require_once("./Views/AdminPages/EditContactPage.php");
    require_once("./Views/AdminPages/DiaporamaAdminPage.php");
    require_once("./Views/AdminPages/AddDiaporamaPage.php");
    require_once("./Views/AdminPages/EditDiaporamaPage.php");





    






    







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
    $EditMarquePage =new EditMarquePage();
    $VehiculeAdminPage = new VehiculeAdminPage();
    $AddVehiculePage = new AddVehiculePage();
    $EditVehiculePage = new EditVehiculePage();
    $AvisAdminPage = new AvisAdminPage();
    $NewsAdminPage = new NewsAdminPage();
    $AddNewsPage = new AddNewsPage();
    $EditNewsPage = new EditNewsPage();
    $UserAdminPage = new UserAdminPage();
    $ParamsAdminPage = new ParamsAdminPage();
    $GuideAdminPage = new GuideAdminPage();
    $AddGuidePage = new AddGuidePage();
    $EditGuidePage = new EditGuidePage();
    $ContactAdminPage = new ContactAdminPage();
    $AddContactPage = new AddContactPage();
    $EditContactPage = new EditContactPage();
    $DiaporamaAdminPage = new DiaporamaAdminPage();
    $AddDiaporamaPage = new AddDiaporamaPage();
    $EditDiaporamaPage = new EditDiaporamaPage();


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
        case '/ComparateurVehicules/admin/editmarque':
            $EditMarquePage->getPage();
            break;
        case '/ComparateurVehicules/admin/vehicules':
            $VehiculeAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/addvehicule':
            $AddVehiculePage->getPage();
            break;
        case '/ComparateurVehicules/admin/editvehicule':
            $EditVehiculePage->getPage();
            break;
        case '/ComparateurVehicules/admin/avis':
            $AvisAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/news':
            $NewsAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/addnews':
            $AddNewsPage->getPage();
            break;
        case '/ComparateurVehicules/admin/editnews':
            $EditNewsPage->getPage();
            break;   
        case '/ComparateurVehicules/admin/users':
            $UserAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params':
            $ParamsAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/guide':
            $GuideAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/addguide':
            $AddGuidePage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/editguide':
            $EditGuidePage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/contact':
            $ContactAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/addcontact':
            $AddContactPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/editcontact':
            $EditContactPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/diaporama':
            $DiaporamaAdminPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/adddiaporama':
            $AddDiaporamaPage->getPage();
            break;
        case '/ComparateurVehicules/admin/params/editdiaporama':
            $EditDiaporamaPage->getPage();
            break;
        //EditDiaporamaPage     


        default:
            printf("Not Found");
            break;

        }
    



?>