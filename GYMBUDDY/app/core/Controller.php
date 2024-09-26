<?php

class Controller {

    // Load the model
    protected function model($model) {
        
        if (file_exists("../app/models/" . $model . ".php")) {
            require_once "../app/models/" . $model . ".php";
            return new $model();
        } else {
            die("Model does not exist.");
        }
    }

    // Load the view
    protected function view($view, $data = []) {
        if (file_exists("../app/views/" . $view . ".php")) {
            require_once "../app/views/" . $view . ".php";
        } else {
            die("View does not exist.");
        }
    }
}

