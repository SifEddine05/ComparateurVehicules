<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="/ComparateurVehicules/assets/facebook.png" />
    <a href="newsDetails?id=1">Call Us</a>
    <?php
    require_once("./Models/MarqueModel.php");
    $model = new MarqueModel();
    $res = $model->getPrincipaleMarques();
    print_r($res);
?>

</body>
</html>