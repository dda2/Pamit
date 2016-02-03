<?php

namespace Pamit\Controllers;

use Pamit\Core\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AuthController extends Controller
{
    public function getSignup(Request $request, Response $response, $args)
    {
        $user = $this->db
                        ->query("SELECT * FROM users")
                        ->fetchAll(\PDO::FETCH_OBJ);
        return $this->view->render($response, 'admin/auth/signup.twig');
    }

    public function getSignin(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'admin/auth/signin.twig');
    }

    public function postSignin(Request $request, Response $response, $args)
    {

    }
}