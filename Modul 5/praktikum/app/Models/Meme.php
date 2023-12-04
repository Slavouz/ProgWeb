<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";

use app\Config\DatabaseConfig;
use mysqli;

class Meme extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function findAllMeme()
    {
        $sql = "SELECT meme.*, category.name AS category_name FROM meme JOIN category ON meme.category_id = category.id";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findMemeById($id)
    {
        $sql = "SELECT * FROM meme WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function createPost($data)
    {
        $memeTitle = $data['title'];
        $memeImgUrl = $data['imgUrl'];
        $memeDesc = $data['memeDesc'];
        $memeCategoryId = $data['category_id'];
        $query = "INSERT INTO meme (title, imgUrl, memeDesc, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $memeTitle, $memeImgUrl, $memeDesc, $memeCategoryId);
        $stmt->execute();
        $this->conn->close();
    }

    public function updatePost($data, $id)
    {
        $memeTitle = $data['title'];
        $memeImgUrl = $data['imgUrl'];
        $memeDesc = $data['memeDesc'];
        
        $query = "UPDATE meme SET title = ?, imgUrl = ?, memeDesc = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);        
        $stmt->bind_param("sssi", $memeTitle, $memeImgUrl, $memeDesc, $id);
        $stmt->execute();
        $this->conn->close();
    }
    
    public function destroyPost($id)
    {
        $query = "DELETE FROM meme WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}