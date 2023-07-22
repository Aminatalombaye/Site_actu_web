<?php
require_once 'ArticleDAO.php';
require_once 'Connexion.php';

class ArticleModel
{
    private $articleDAO;
    private $db;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->db = Connexion::getInstance();
    }

    public function getAllArticles()
    {
        return $this->articleDAO->getAllArticles();
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM Categorie";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id)
    {
        return $this->articleDAO->getArticleById($id);
    }

    public function ajouterArticle($titre, $categorieId, $contenu)
    {
        $sql = "INSERT INTO Article (titre, categorie, contenu, dateCreation) VALUES (:titre, :categorie, :contenu, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':categorie', $categorieId);
        $stmt->bindParam(':contenu', $contenu);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }




    public function supprimerArticle($id)
    {
        $sql = "DELETE FROM Article WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }

    public function modifierArticle($id, $titre, $categorieId, $contenu)
    {
        $sql = "UPDATE Article SET titre = :titre, categorie = :categorie, contenu = :contenu, dateModification = NOW() WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':categorie', $categorieId);
        $stmt->bindParam(':contenu', $contenu);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }
}
?>

