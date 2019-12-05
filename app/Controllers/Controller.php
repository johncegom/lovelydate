<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Image;

class Controller {
    protected $view;

    public function __construct() {
        $this->view = new \League\Plates\Engine(ROOTDIR.'views');
    } 


    public function home() {
        $data = [
            'users' => User::where('is_admin', 0)->get(),
            // 'images' => Image::get()
        ];
        echo $this->view->render("homes/index", $data);
    }

    public function admin() {

        if (!$_SESSION['admin']) {
            header("location: /");
        }

        $data = [
            'users' => User::where('is_admin', 0)->get()
        ];
        echo $this->view->render("admins/home", $data);
    }

    public function notFound() {
        http_response_code(404);
        echo $this->view->render("errors/404");
    }
}