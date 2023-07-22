<?php
require_once 'Connexion.php';

class ArticleDAO
{
    public function getAllArticles()
    {
        $bdd = (new Connexion)->getInstance();
        $query = $bdd->prepare("SELECT * FROM Article");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id)
    {
        $bdd = (new Connexion)->getInstance();
        $query = $bdd->prepare("SELECT * FROM Article WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
?>
