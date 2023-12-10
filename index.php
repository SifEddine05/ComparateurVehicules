<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/ComparateurVehicules/css/style.css">

    <title>Document</title>
</head>
<body>
    <?php
        require_once("./Views/Pages/LandingPage.php");
        $model = new LandingPage();
        $model->getLandingPage();
    ?>

<!-- 5057F4 -->
    <!-- <img src="/ComparateurVehicules/assets/facebook.png" />
    <a href="newsDetails?id=1">Call Us</a> -->
    <!-- <div>
        <img src="./assets/logoo.png" alt="logo" />
        <div>
            <?php
                require_once("./Models/MarqueModel.php");

            ?>
        </div>
    </div> -->
    <!-- <?php
    require_once("./Models/MarqueModel.php");
    $model = new MarqueModel();
    $res = $model->getPrincipaleMarques();
    print_r($res);
?> -->

</body>
</html>