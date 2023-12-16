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
        public function getLatestNews()
        {
            $lastnews = $this->newsctl->getLatestNews();
            
            ?>
    <div class="LatestNews-container">
        <h5 class="titles">Les derniers News</h5>
        <div class="LatestNews">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                <div class="carousel-item active">
                <a href="/ComparateurVehicule/newsdetails?id=<?php echo $lastnews[0]['NewsId']?>" >
                    <img src="<?php echo $lastnews[0]['image']?>"  class="d-block w-100">
                    <h3><?php echo $lastnews[0]['titre'] ?> </h3>
                </a>
                    
                </div>
                <div class="carousel-item">
                <a href="/ComparateurVehicule/newsdetails?id=<?php echo $lastnews[1]['NewsId']?>" >

                    <img src="<?php echo $lastnews[1]['image']?>" class="d-block w-100">
                    <h3><?php echo $lastnews[1]['titre'] ?> </h3>
                </a>

                </div>
                <div class="carousel-item">
                <a href="/ComparateurVehicule/newsdetails?id=<?php echo $lastnews[2]['NewsId']?>" >
                    <img src="<?php echo $lastnews[2]['image']?>"  class="d-block w-100">
                    <h3><?php echo $lastnews[2]['titre'] ?> </h3>
                </a>

                </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                    </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

        <?php
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
                <h5 class="titles"> Explorez tous les News</h5>
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
            $records_per_page = 2;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $records_per_page;
            $this->UserComponents->Header();
            echo "<body>";
            $this->UserComponents->NavBar();
            $this->UserComponents->menu() ; 
            $this->getLatestNews();
            $this->NewsCards($offset,$records_per_page);
            $this->Pagination($page,$records_per_page) ;
            $this->UserComponents->footer() ; 
            echo "</body> </html>";
        }
        
    }
?>