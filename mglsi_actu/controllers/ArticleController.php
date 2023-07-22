<?php
require_once 'models/ArticleModel.php';
require_once 'models/Connexion.php';

class ArticleController
{
    private $articleModel;
    private $db;
    private $categories;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->categories = $this->articleModel->getAllCategories();
        $this->db = Connexion::getInstance();
    }

    public function getAllCategories()
    {
        return $this->categories;
    }

    public function ajouter_article()
    {
        $categories = $this->articleModel->getAllCategories();
        require_once 'views/ajout_article.php';
    }

    public function ajouterArticle()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
            $categorieId = isset($_POST['categorie']) ? $_POST['categorie'] : '';
            $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';

            $result = $this->articleModel->ajouterArticle($titre, $categorieId, $contenu);

            if ($result) {
                header('Location: index.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de l'article.";
            }
        }
    }

 public function modifier_article()
{
    if (isset($_GET['id'])) {
        $articleId = $_GET['id'];

        $article = $this->articleModel->getArticleById($articleId);

        if (!$article) {

            header('Location: index.php?erreur=article_inexistant');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {


            $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
            $categorieId = isset($_POST['categorie']) ? $_POST['categorie'] : '';
            $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';

            $result = $this->articleModel->modifierArticle($articleId, $titre, $categorieId, $contenu);

            if ($result) {

                header('Location: index.php?message=article_modifie');
                exit();
            } else {


                header('Location: index.php');
            exit();
            }
        }

        require_once 'views/modifier_article.php';
    } else {

        header('Location: index.php');
        exit();
    }
}


public function supprimer_article()
{
    if (isset($_GET['id'])) {
            $articleId = $_GET['id'];

            $result = $this->articleModel->supprimerArticle($articleId);

            if ($result) {

                header('Location: index.php');
                exit();
            } else {
                echo "Erreur lors de la suppression de l'article.";
            }
        } else {

            header('Location: index.php');
            exit();
        }
}

 

}

?>
