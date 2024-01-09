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
    public function getAllNews()
    {
        $res = $this->news->getAllNews();
        return $res ;
    }
    public function AddNews($titre , $description,$text)
    {
        $res = $this->news->AddNews($titre , $description,$text);
        return $res ;
    }

    public function AddImage($url)
    { 
        $res = $this->news->AddImage($url);
        return $res ;
    }

    public function AddImageNews($imageId,$NewsId)
    {
        $res = $this->news->AddImageNews($imageId,$NewsId);
        return $res ;
    }
    public function DeleteNews($newsId)
    {
        $res = $this->news->DeleteNews($newsId);
        return $res ;
    }
    public function EditImageNews($imageId,$NewsId)
    {
        $res = $this->news->EditImageNews($imageId,$NewsId);
        return $res ;
    }
    public function EditNews($titre , $description,$text ,$newsId)
    {
        $res = $this->news->EditNews($titre , $description,$text ,$newsId);
        return $res ;
    }

}
?>