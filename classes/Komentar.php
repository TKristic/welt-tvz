<?php

class Komentar {

    protected $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function fetch_all_komentari($news_id) {
        $sql = "SELECT * FROM komentari WHERE news_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function create($user_id, $news_id, $komentar) {
        $sql = "INSERT INTO komentari(user_id, news_id, sadrzaj) VALUES(?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $user_id, $news_id, $komentar);
        $stmt->execute(); 
    }

    public function get_username($user_id) {
        $sql = "SELECT username FROM korisnici WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            echo $row['username'];
        } 
    }

    public function obrisi($id) {
        $sql = "DELETE FROM komentari WHERE comm_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    

}
