<?php
class AdminComponents {
    public function Header()
    {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Admin Dashboard</title>
        </head>';
    }
    public function menu()
    {
        ?>
        <div class="menu-container-admin">
            <a href="/ComparateurVehicules/admin">Page Principale</a>
            <a href="/ComparateurVehicules/admin/marques">Gestion Vehicules</a>
            <a  href="/ComparateurVehicules/admin/avis">Gestion Avis</a>
            <a  href="/ComparateurVehicules/admin/news">Gestion News</a>
            <a  href="/ComparateurVehicules/admin/users">Gestion Utilisateurs</a>
            <a  href="/ComparateurVehicules/admin/params">Gestion Paramètres</a>
        </div>
        <?php
    }
}
?>