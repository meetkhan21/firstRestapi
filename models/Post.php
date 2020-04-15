<?php

class Post
{
    // DB stuff
    private $conn;
    private $table = "posts";

    // Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Now creating CRUD methods for posts
    // Function for reading posts
    public function readPost()
    {
        // create query
        $query = "SELECT c.name as category_name,
            p.id, p.category_id, p.title, p.body, p.author, p.created_at 
            FROM
            ". $this->table . " p
            LEFT JOIN
            category c on p.category_id = c.id
            ORDER BY 
            created_at DESC";
        // Prepare and Execute statements
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
