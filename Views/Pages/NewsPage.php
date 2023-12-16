<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Controllers/NewsController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Views/Components/UserComponents.php');

class NewsPage {
        private $newsctl ; 
        private $UserComponents ;

        public function __construct()
        {
            $this->UserComponents = new UserComponents();
            $this->newsctl = new NewsController();
        }
        


        public function NewsCard($news)
        {?>
            <div class="NewsCard">
                <div class="Title-container">
                    <img src="<?php echo $news['image'] ?>" width="300px" alt="news"/>
                    <h6><?php echo $news['titre']?></h6>
                </div>
                <div class="NewsCardContent">
                    <p class="desciption"><?php echo $news['description']?></p>
                    <div>
                        <p> Date de publication : <span><?php echo $news['date_creation']?></span></p>
                    </div>
                    <div class="voirPlus">
                        <a href="<?php echo $news['NewsId'] ?>" >Voir Plus </a>
                    </div>
                </div>
            </div>    
        <?php
        }

        public function NewsCards($offset,$records_per_page)
        {
            $lastnews = $this->newsctl->getNewsByPage($offset,$records_per_page);

        ?>
            <div class="News-container">
                <h5 class="titles"> Explorez  les derniers news des vehicules</h5>
                <div class="Cards-container">
                    <?php foreach($lastnews as $last)
                    {
                        $this->NewsCard($last) ;
                    }
                    ?>

                </div>
            </div>
        
        <?php }

        public function Pagination($page,$records_per_page)
        {
            $nbr= $this->newsctl->getNbrNews() ;
            $nbr=$nbr[0]['nbr'];
            $nbrPages=ceil($nbr/$records_per_page) ;
            $suiv =$page+1 ; 
            $prec=$page-1;
        ?>
        <div class="pagination-container">
            <nav aria-label="..." >
            <ul class="pagination">

                <li class="page-item <?php if($page==1) echo 'disabled' ?>">
                    <a class="page-link" href="/ComparateurVehicules/news?page=<?php echo $prec ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                
                <?php 
                    for ($i = 1; $i <= $nbrPages; $i++) {
                        if($page==$i)
                        {
                        ?>
                            <li class="page-item active">
                                <a class="page-link" href="/ComparateurVehicules/news?page=<?php echo $i ?>"><?php echo $i?></a>
                            </li>
                        <?php
                        }
                        else{
                            ?>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="/ComparateurVehicules/news?page=<?php echo $i ?>"><?php echo $i?></a>
                            </li>
                        <?php
                        }
                    }
                ?>
                <li class="page-item <?php if($page==$nbrPages) echo 'disabled' ?>">
                    <a class="page-link" href="/ComparateurVehicules/news?page=<?php echo $suiv ?>">Next</a>
                </li>
            </ul>
            </nav>
        </div>

       <?php
        }

        public function getPage()
        {
            $records_per_page = 10;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $records_per_page;
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->NewsCards($offset,$records_per_page);
            $this->Pagination($page,$records_per_page) ;
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
        
    }
?>