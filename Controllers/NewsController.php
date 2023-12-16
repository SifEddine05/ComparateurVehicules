<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/ComparateurVehicules/Models/NewsModel.php');

class NewsController{
    private $news ; 
    public function __construct()
    {
        $this->news = new NewsModel();
    }

    public function getLatestNews()
    {
        $res = $this->news->getLatestNews();
        return $res ;
    }

    public function getNewsByPage($offset,$records_per_page)
    {
        $res = $this->news->getNewsByPage($offset,$records_per_page);
        return $res ;
    }
    public function getNbrNews()
    {
        $res = $this->news->getNbrNews();
        return $res ; 
    }
    public function getNewsById($id)
    {
        $res = $this->news->getNewsById($id);
        return $res ;
    }

}
?>