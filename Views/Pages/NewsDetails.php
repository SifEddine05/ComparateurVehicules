<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/NewsController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class NewsDetails {
    private $newsctl ; 
    private $UserComponents ;

    public function __construct()
    {
        $this->UserComponents = new UserComponents();
        $this->newsctl = new NewsController();
    }

    public function NewsDetails($id)
    {
        $res = $this->newsctl->getNewsById($id);
        $news = $res[0] ;
    ?>
        <div class="NewsDetails">
            <h2 class="titles"><?php echo $news['titre'] ?></h2>
            <div class="Newscontent">
                <img src="<?php echo $news['image'] ?>" />
                <p class="datecreate"><?php echo $news['date_creation'] ?></p>
                <p class="descrp"><?php echo $news['description'] ?></p>
                <p class="text"><?php echo $news['Text'] ?></p>
            </div>
        </div>
    <?php
    }




    public function getPage()
        {
            $id = $_GET['id'];
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->NewsDetails($id);
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }


}