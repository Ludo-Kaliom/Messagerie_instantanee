<?php
class Model {

    private $host = 'localhost';
    private $dbname = '';
    private $username = '';
    private $password = '';

    protected $_connexion;

    public function getConnexion() {
        $this->_connexion = null;
        try {
        $this->_connexion = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
                                    
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base";
        }
    }
}
