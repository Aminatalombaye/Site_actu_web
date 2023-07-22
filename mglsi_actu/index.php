<?php
require_once 'controllers/IndexController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ArticleController.php';

$action = isset($_GET['action']) ? strtolower($_GET['action']) : '';

$indexController = new IndexController();
$userController = new UserController();
$articleController = new ArticleController();

if ($action === 'ajouter_article') {
    $articleController->ajouter_article();
} elseif ($action === 'modifier_article') {
    $articleController->modifier_article();
} elseif ($action === 'supprimer_article') {
    $articleController->supprimer_article();
} else {
    switch ($action) {
        case 'article':
            $indexController->article();
            break;

        case 'categorie':
            $indexController->categorie();
            break;

        case 'login':
            $userController->login();
            break;

        case 'register':
            $userController->register();
            break;

        default:
            $indexController->accueil();
            break;
    }
}
?>
