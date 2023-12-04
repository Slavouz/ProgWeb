<?php

namespace app\Models;

use mysqli;

class Category
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "meme_api", 3306);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id = ?";
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

    public function createCategory($data)
    {
        $categoryName = $data['name'];        
        $query = "INSERT INTO category (name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $this->conn->close();
    }

    public function updateCategory($data, $id)
    {
        $categoryName = $data['name'];
        $query = "UPDATE category SET title = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);        
        $stmt->bind_param("si", $categoryName, $id);
        $stmt->execute();
        $this->conn->close();
    }
    
    public function destroyCategory($id)
    {
        $query = "DELETE FROM category WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}