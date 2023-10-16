<?php

class Database {

    private $db = null;

    public function __construct($host, $username, $pass, $db) {
        $this->db = new mysqli($host, $username, $pass, $db);
    }

    public function login($name, $pass) {
        //-- jelezzük a végrehajtandó SQL parancsot
        $stmt = $this->db->prepare('SELECT * FROM users WHERE users.name LIKE ?;');
        //-- elküldjük a végrehajtáshoz szükséges adatokat
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            //-- sikeres végrehajtás után lekérjük az adatokat
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass==$row['password']) {
                //-- felhasználónév és jelszó helyes
                $_SESSION['username'] = $row['name'];
                $_SESSION['login'] = true;
                header("Location: index.php");
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            // Free result set
            $result->free_result();
        }
        return false;
    }

    public function register($igazolvanyszam, $username, $email, $name, $pass) {
        $password = password_hash($pass, PASSWORD_BCRYPT);
        var_dump($password);
        $stmt = $this->db->prepare("INSERT INTO `users` (`igazolvanyszam`, `orokbefogado_neve`, `emailcim`, `user`, `password`) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $igazolvanyszam, $username, $email, $name, $pass);
        if ($stmt->execute()) {
            $_SESSION['login'] = true;
            //header("Location: index.php");
        } else {
            $_SESSION['login'] = false;
            echo '<p>Rögzítés sikertelen!</p>';
        }
    }
    
    public function  osszesAllat(){
        $result = $this->db->query("SELECT * FROM `allat`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function  kivalasztottAllat($id){
        $sql="SELECT * FROM `allat` WHERE allatid=".$id;
        var_dump($sql);
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }
}
