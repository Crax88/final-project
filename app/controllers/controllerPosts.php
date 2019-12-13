<?php

class controllerPosts extends Controller {
    protected $access = [
        ['allow', 'actions' => ['edit', 'delete'], 'author'],
        ['allow', 'actions' => ['edit', 'delete'], 'roles'=> ['moderator']],
        ['allow', 'actions' => ['add'], 'roles' => ['manager']],
        ['allow', 'actions' => ['show'], 'roles' => ['manager', 'moderator']],
    ];

    public function __construct() {
        parent::__construct();
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function actionIndex() {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        // echo '<pre>';
        // print_r($posts);
        // die();
        $this->view('posts/index', $data);
    }

    public function actionAdd() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->postModel->addPost();
            if ($data['success']) {
                flashMsg('post_message', 'Post Added');
                redirect('posts');
            } else {
                $this->view('posts/add', $data);
            }
        } else {
            $this->view('posts/add');
        }
    }

    public function actionShow() {
        $id = Core::app()->request->params;
        $data['post'] = $this->postModel->getPost($id);
        $data['user'] = $this->userModel->getUser($data['post']->user_id);
        $this->postModel->updatePostViews($data['post']);
        $this->view('posts/show', $data);
    }

    public function actionEdit() {
        $id = Core::app()->request->params;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->postModel->updatePost($id);
            if ($data['success']) {
                flashMsg('post_message', 'Post Updated');
                redirect('posts');
            } else {
                $this->view('posts/edit', $data);
            }
        } else {
            $post = $this->postModel->getPost($id);
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];
            $this->view('posts/edit', $data);
        }
    }

    public function actionDelete() {
        $id = Core::app()->request->params;

        if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }
        $post = $this->postModel->getPost($id);
        $this->postModel->deletePost($id);
        flashMsg('post_message', 'Post Removed');
        redirect('posts');
    }
    public function actionComment($id) {
        if ($_SERVER['REQUEST)METHOD'] = 'POST') {
            $this->userModel->getUser($_SESSION['user_id']);
            $this->postModel->commentPost($id);    
        }
        
    }
}