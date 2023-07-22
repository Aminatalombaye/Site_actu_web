<?php
require_once 'models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';


        $userModel = new UserModel();


        $user = $userModel->getUserByUsernameAndPassword($username, $password);
        if ($user) {

            session_start();
            $_SESSION['user_logged_in'] = true;

            // Rediriger vers la page d'accueil
            header("Location: index.php");
            exit;
        } else {

            echo "Veuillez vérifier vos informations d'identification.";
        }
    }


    require_once 'views/login.php';
}

 
   public function register()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';



        if ($password !== $confirmPassword) {
            echo "Les mots de passe ne correspondent pas.";
            return; 

        }


        $userModel = new UserModel();


        if ($userModel->registerUser($username, $email, $password)) {
            echo "L'utilisateur est enregistré avec succès.";
            
header("Location: views/registration_success.php");
            exit;
        } else {

            echo "Erreur lors de l'enregistrement de l'utilisateur.";
        }
    }

    require_once 'views/registration.php';
}


}
?>
