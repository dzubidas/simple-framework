<?php

namespace App\controller;

use dockerphp\framework\Http\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PostController {


    public function show(int $id): Response {

        $loader = new FilesystemLoader( __DIR__ . '/../../templates');
        $twig = new Environment($loader);
        $content = $twig->render('post.twig', ['id' => $id]);

        return new Response($content);
    }
}