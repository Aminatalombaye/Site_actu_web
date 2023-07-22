<?php
require_once 'CategorieDAO.php';

class CategorieModel
{
    private $categorieDAO;

    public function __construct()
    {
        $this->categorieDAO = new CategorieDAO();
    }

    public function getAllCategories()
    {
        return $this->categorieDAO->getAllCategories();
    }

    public function getArticlesByCategoryId($categoryId)
    {
        return $this->categorieDAO->getArticlesByCategoryId($categoryId);
    }
}
?>
