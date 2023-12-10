<?php

namespace App\controller;

use dockerphp\framework\Http\Response;
use dockerphp\framework\Http\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class FormController extends BaseController {

    public function form() {
        $this->startSession();
        if ($this->getSession('submitted_form') === 1) {
            $name = $this->getSession('name');
            return $this->render('form_already_submitted.twig', ['name' => $name]);
        } else {
            return $this->render('form.twig');
        }
    }

    public function submit(Request $request) {
        $this->startSession();
        $this->setSession('submitted_form', 1);
        $this->setSession('name', $request->request['name']);

        return $this->render('form_submitted.twig', ['name' => $request->request['name'], ['email' => $request->request['email']]]);
    }
}