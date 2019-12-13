<?php

class modelPost 
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as usersCreated 
                        FROM posts
                        JOIN users
                        on posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');
        $posts = $this->db->resultSet();
        return $posts;
    }

    public function addPost() {

        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'success' => false,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'img_saveName' => '',
            'img_originalName' => '',
            'title_error' => '',
            'body_error' => '',
            'img_error' => ''
        ];
        if ($_FILES['image']['tmp_name'] != '') {
            $data = image_uploader($data);
        } 
        if (empty($data['title'])) {
            $data['title_error'] = 'Please enter post title';
        }
        if (empty($data['body'])) {
            $data['body_error'] = 'Please enter post text';
        }
        if (empty($data['title_error']) && empty($data['body_error']) && empty($data['img_error'])) {
            $this->db->query('INSERT INTO posts (title, user_id, body, img_name, img_originalName ) VALUES (:title, :user_id, :body, :img_name, :img_originalName)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':img_name', $data['img_saveName']);
            $this->db->bind(':img_originalName', $data['img_originalName']);
            if($this->db->exec()) {
                $data['success'] = true;
            } 
        }
        return $data;
    }

    public function getPost($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $post = $this->db->single();
        return $post;
    }

    public function updatePost($id) {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'success' => false,
            'id' => $id,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'title_error' => '',
            'body_error' => ''
        ];

        if (empty($data['title'])) {
            $data['title_error'] = 'Please enter post title';
        }
        if (empty($data['body'])) {
            $data['body_error'] = 'Please enter post text';
        }
        if (empty($data['title_error']) && empty($data['body_error'])) {
           $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
           $this->db->bind(':title', $data['title']);
           $this->db->bind(':body', $data['body']);
           $this->db->bind(':id', $data['id']);
           if($this->db->exec()) {
               $data['success'] = true;
           } 
        }

        return $data;

    }

    public function updatePostViews($post) {
        if ($post->user_id != $_SESSION['user_id']) {
            $this->db->query('UPDATE posts SET views = views + 1 WHERE id = :postId');
            $this->db->bind(':postId', $post->id);
            $this->db->exec();
        }
    }

    public function deletePost($id) {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }

}