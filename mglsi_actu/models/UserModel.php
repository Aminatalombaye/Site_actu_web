<?php
require_once 'UserDAO.php';

class UserModel
{
    private $userDAO;
        private $connexion;


    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->connexion = Connexion::getInstance();

    }

    public function registerUser($username, $email, $password)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    return $this->userDAO->createUser($username, $email, $hashed_password);
}



    public function getUserByUsernameAndPassword($username, $password)
    {
        // Requête SQL pour récupérer l'utilisateur avec le nom d'utilisateur donné
        $query = "SELECT * FROM Users WHERE username = :username";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Récupérer l'utilisateur
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe s'il existe un utilisateur avec le nom d'utilisateur donné
        if ($user && password_verify($password, $user['password'])) {
            // Mot de passe correct, retourner l'utilisateur
            return $user;
        } else {
            // Utilisateur non trouvé ou mot de passe incorrect, retourner false
            return false;
        }
    }


}
?>
