<?php

namespace Pamit\Controllers;

use Pamit\Core\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Valitron\Validator;

class AuthController extends Controller
{
    public function getSignup(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'admin/auth/signup.twig');
    }

    public function postSignup(Request $request, Response $response, $args)
    {
        $req = $request->getParsedBody();
        $this->validator->rule('required', ['username', 'email', 'password']);
        $this->validator->labels([
            'username'  => $req['username'],
            'email'     => $req['email'],
            'password'  => $req['password']
            ]);
        if ($this->validator->validate()) {
            $query = 'INSERT INTO users (username, password, email, first_name, last_name)
                    value (:username, :password, :email, :first_name, :last_name)';

            $result = $this->db->prepare($guery);

            $result->binParam(':username', $username['username']);
            $result->binParam(':password', $password['']);
            $result->binParam(':email', $email);
            // $result->binParam(':first_name', $first_name);
            // $result->binParam(':last_name', $last_name);

            $result->execute();
        } else {
                print_r($this->validator->errors());
        }
        return $this->view->render($response, 'admin/home.twig');
    }

    public function getSignin(Request $request, Response $response, $args)
    {
        $req = $request->getParsedBody();

        return $this->view->render($response, 'admin/auth/signin.twig');
    }

    public function postSignin(Request $request, Response $response, $args)
    {

    }
}