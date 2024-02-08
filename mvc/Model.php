<?php
require_once("db_config.php");
require_once("View.php");

class Kayttaja {
    private $kayttajaid;
    private $etunimi;
    private $sukunimi;

    public function __construct($kayttajaid = NULL, $etunimi = "", $sukunimi = "") {
        $this->kayttajaid = $kayttajaid;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }

    public function getKayttajaId() {
        return $this->kayttajaid;
    }

    public function setKayttajaId($kayttajaid) {
        $this->kayttajaid = $kayttajaid;
    }

    public function getEtunimi() {
        return $this->etunimi;
    }

    public function setEtunimi($etunimi) {
        $this->etunimi = $etunimi;
    }

    public function getSukunimi() {
        return $this->sukunimi;
    }

    public function setSukunimi($sukunimi) {
        $this->sukunimi = $sukunimi;
    }
}




class Model {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllUsers() {
        $users = array();

        $query = "SELECT * FROM kayttaja";
        $stmt = $this->pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new Kayttaja($row['kayttajaid'], $row['etunimi'], $row['sukunimi']);
            $users[] = $user;
        }

        return $users;
    }


    public function getUserById($userId) {
        $query = "SELECT * FROM kayttaja WHERE kayttajaid = " . $userId;
        $result = $this->connection->query($query);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Kayttaja($row['kayttajaid'], $row['etunimi'], $row['sukunimi']);
        }
    
        return null;
    }
    

    public function addUser($etunimi, $sukunimi) {
        $etunimi = $this->connection->real_escape_string($etunimi);
        $sukunimi = $this->connection->real_escape_string($sukunimi);

        $query = "INSERT INTO kayttaja (etunimi, sukunimi) VALUES ('$etunimi', '$sukunimi')";
        $this->connection->query($query);
    }

    public function updateUser($userId, $etunimi, $sukunimi) {
        $userId = $this->connection->real_escape_string($userId);
        $etunimi = $this->connection->real_escape_string($etunimi);
        $sukunimi = $this->connection->real_escape_string($sukunimi);

        $query = "UPDATE kayttaja SET etunimi='$etunimi', sukunimi='$sukunimi' WHERE kayttajaid=$userId";
        $this->connection->query($query);
    }

    public function deleteUser($userId) {
        $userId = $this->connection->real_escape_string($userId);

        $query = "DELETE FROM kayttaja WHERE kayttajaid=$userId";
        $this->connection->query($query);
    }
}

?>
