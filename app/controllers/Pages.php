<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (isLogged()) {
            redirect("posts");
        }
        $data = [
            "title" => "Shareposts",
            "description" => "Simple social network app with PHP MVC"
        ];
        $this->view('templates/pages/index', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About Us",
            "description" => "App to share posts with others"
        ];
        $this->view('templates/pages/about', $data);
    }
}
