<?php
require_once 'models/ArticleModel.php';
require_once 'models/CategorieModel.php';

class IndexController
{
    private $articleModel;
    private $categorieModel;
    private $categories;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->categorieModel = new CategorieModel();
        $this->categories = $this->categorieModel->getAllCategories();
    }

    public function accueil()
    {
        $articles = $this->articleModel->getAllArticles();
        $categories = $this->categorieModel->getAllCategories();

        require_once 'views/entete.php';
        require_once 'views/accueil.php';
    }

    public function article()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $article = $this->articleModel->getArticleById($id);

            require_once 'views/entete.php';
            require_once 'views/article.php';
        } else {
            echo "L'article n'existe pas.";
        }
    }

    public function categorie()
    {
        $categoryId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($categoryId) {
            $articles = $this->categorieModel->getArticlesByCategoryId($categoryId);

            require_once 'views/entete.php';
            require_once 'views/articleCategorie.php';
        } else {
            echo "La catégorie n'existe pas.";
        }
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

            if ($password !== $confirm_password) {
                echo "Les mots de passe ne correspondent pas.";
                return; 
            }

            require_once 'models/UserModel.php';

            $userModel = new UserModel();

            if ($userModel->registerUser($username, $password)) {
                echo "L'utilisateur est enregistré avec succès.";

                header("Location: registration_success.php");
                exit;
            } else {
                echo "Erreur lors de l'enregistrement de l'utilisateur.";
            }
        }

        require_once 'views/registration.php';
    }

    public function ajouter_article()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';


        $articleModel = new ArticleModel();

        if ($articleModel->ajouterArticle($titre, $categorie, $contenu)) {
            echo "L'article a été ajouté avec succès.";
            header("Location: index.php");
            exit;
        } else {

            echo "Erreur lors de l'ajout de l'article.";
        }
    }

    require_once 'views/ajouter_article.php';
}

public function ajouterArticle()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
            $categorieId = isset($_POST['categorie']) ? $_POST['categorie'] : '';
            $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';

            $articleModel = new ArticleModel();

            $result = $articleModel->ajouterArticle($titre, $categorieId, $contenu);

            if ($result) {
                header('Location: index.php');
                exit;
            } else {
                echo "Erreur lors de l'ajout de l'article.";
            }
        }
    }

}
?>
