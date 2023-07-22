<?php
require_once 'Connexion.php';

class UserDAO
{


    public function getUserById($userId)
    {
        $bdd = (new Connexion)->getInstance();
        $query = $bdd->prepare("SELECT * FROM Users WHERE id = :id");
        $query->bindParam(':id', $userId);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

   public function getUserByUsername($username)
{
    $bdd = (new Connexion)->getInstance();
    $query = $bdd->prepare("SELECT * FROM Users WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

        public function createUser($username, $email, $password)
{
    $bdd = (new Connexion)->getInstance();
    $query = $bdd->prepare("INSERT INTO Users (username, email, password) VALUES (:username, :email, :password)");
    $query->bindParam(':username', $username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    return $query->execute();
}

}
?>