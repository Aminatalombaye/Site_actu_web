<?php
require_once 'Connexion.php';

class CategorieDAO
{
    public function getAllCategories()
    {
        $bdd = (new Connexion)->getInstance();
        $query = $bdd->prepare("SELECT * FROM Categorie");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticlesByCategoryId($categoryId)
    {
        $bdd = (new Connexion)->getInstance();
        $query = $bdd->prepare('SELECT * FROM Article WHERE categorie = :categoryId');
        $query->bindParam(':categoryId', $categoryId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
