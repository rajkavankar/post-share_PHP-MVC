<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query("SELECT *, 
                        users.id as userId,
                        posts.id as postId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON users.id = posts.user_id
                        ORDER BY posts.created_at DESC
                        ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts(user_id, title, body)
                         VALUES(:userId, :title, :body)');
        $this->db->bind(':userId', $data["user_id"]);
        $this->db->bind(':title', $data["title"]);
        $this->db->bind(':body', $data["body"]);
        $result = $this->db->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    public function getPostById($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title=:title, body=:body WHERE id = :id');

        $this->db->bind(':id', $data["id"]);
        $this->db->bind(':title', $data["title"]);
        $this->db->bind(':body', $data["body"]);
        $result = $this->db->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($data)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');

        $this->db->bind(':id', $data["id"]);
        $result = $this->db->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
