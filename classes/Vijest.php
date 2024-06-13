<?php

class Vijest {

    protected $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function fetch_all_vijesti() {
        $sql = "SELECT * FROM vijesti";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function fetch_all_politika() {
        $sql = "SELECT * FROM vijesti WHERE kategorija = 'Politika i Društvo'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetch_all_hrana() {
        $sql = "SELECT * FROM vijesti WHERE kategorija = 'Hrana'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function read($news_id) {
        $stmt = $this->conn->prepare("SELECT * FROM vijesti WHERE news_id=?");
        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($slika, $naslov, $predparagraf, $paragraf, $kategorija) {
        $sql = "INSERT INTO vijesti(slika, naslov, predparagraf, paragraf, kategorija) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $slika, $naslov, $predparagraf, $paragraf, $kategorija);
        $stmt->execute(); 
    }

    public function delete($id) {
        $sql = "DELETE FROM vijesti WHERE news_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
