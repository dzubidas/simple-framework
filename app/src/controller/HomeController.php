<?php

namespace App\controller;

use dockerphp\framework\Http\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController extends BaseController {
    public function index() {        
        $this->startSession();
        $user = $this->getSession('name');

        if ($user) {
            return $this->render('home.twig', ['user' => $user]);
        } else {
            return $this->render('home.twig');
        }
        // $loader = new FilesystemLoader( __DIR__ . '/../../templates');
        // $twig = new Environment($loader);
        // $template = $twig->render('home.twig', ['user' => $user]);

        // return new Response(content: $template);
    }
}