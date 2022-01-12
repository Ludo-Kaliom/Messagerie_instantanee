<?php
require_once('Model.php');

class loginModel extends Model {
    public function __construct() {
        $this->getConnexion();
    }

    public function userExists($pseudo, $password) {
        $sql = "SELECT user_id FROM chat_users WHERE user_name=:user_name AND user_password=:user_password";
        $query = $this->_connexion->prepare($sql);
		$query->bindParam(':user_name', $pseudo, PDO::PARAM_STR);
		$query->bindParam(':user_password', $password, PDO::PARAM_STR);
		$query->execute();
     

        $result = $query->fetch(PDO::FETCH_OBJ);
   

        if (!empty($result)) {
            return $result->user_id;
        } else {
            return 0;
        }
    }

    public function userSignup($pseudo, $email, $password){
        $sql = "INSERT INTO chat_users (user_name, user_email, user_password) VALUES (:name, :email, :password)";
        $query = $this->_connexion->prepare($sql);
		$query->bindParam(':name', $pseudo, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();

        $lastInsert = $this->_connexion->lastInsertId();
        if($lastInsert !==FALSE){
            echo '<script>alert("Votre enregistrement est réussi !")</script>';
            return $lastInsert;
        }else{
            echo '<script>alert("Un problème est survenu. Veuillez recommencer");</script>';
            return 0;
        }

    }

    public function forgotPassword($email, $password){

        $sql ="SELECT user_id FROM chat_users WHERE user_email=:user_email";
		$query=  $this->_connexion->prepare($sql);
		$query-> bindParam(':user_email', $email, PDO::PARAM_STR);
		$query-> execute();
		$result = $query->fetch(PDO::FETCH_OBJ);

        if(!empty($result)) {
            $sql = "UPDATE chat_users SET user_password=:password WHERE user_email=:email";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            echo "<script>alert('Votre mot de passe a ete change');</script>";
        }else{
            echo "<script>alert('Email ou mot de passe inconnu');</script>";
        }

    }
}
