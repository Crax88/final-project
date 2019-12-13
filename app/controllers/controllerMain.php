<?php

class controllerMain extends Controller
{
    protected $access = [
        ['allow', 'actions' => ['Index', 'About'], 'privileges' => ['*']]
    ];

    public function actionIndex() {
        $data = [
            'title' => 'Poster',
            'description' => 'A simple social network built with PHP by N.Trafilkin.'
        ];
        $this->view('main/index', $data);
    }

    public function actionAbout() {
        $data = [
            'title' => 'About us',
            'description' => 'App to share post with other users.'
        ];
        $this->view('main/about', $data);
    }

}