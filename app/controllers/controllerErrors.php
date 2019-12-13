<?php

class controllerErrors extends Controller 
{
    protected $access = [
        ['allow', 'actions' => ['404', '403'], 'privileges'=>['*']]
    ];
    // public function __construct() {
    //         parent::__construct();
    //     }
    

    public function action404() {
        $data = [
            'code' => 404,
            'message' => 'Sorry page not found'
        ];
        $this->view('errors/errors', $data);
    }
    public function action403() {
        $data = [
            'code' => 403,
            'message' => 'Sorry access denied'
        ];
    }
}