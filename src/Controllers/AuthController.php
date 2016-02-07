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
            'username'  => 'username',
            'password'  => 'password',
            'email'     => 'email'
            ]);

        $new_password = hash('sha1', $req['password']);

        if ($this->validator->validate()) {
            $query = 'INSERT INTO users (username, password, email) VALUES (:username, :password, :email)';

            $result = $this->db->prepare($query);

            $result->bindParam(':username', $req['username']);
            $result->bindParam(':password', $new_password);
            $result->bindParam(':email', $req['email']);
            // $result->binParam(':first_name', $first_name);
            // $result->binParam(':last_name', $last_name);
            $result->execute();

        } else {
            foreach ($this->validator->errors() as $key => $error) {
                $this->flash->addMessage('error', $error[0]);
            }

            return $this->view->render($response, 'admin/auth/signup.twig');
        }
        // $this->flash->addMessage('success', 'Tes Flashing Message');
        return $this->view->render($response, 'admin/home.twig');
    }

    public function getSignin(Request $request, Response $response, $args)
    {
        $req = $request->getParsedBody();

        return $this->view->render($response, 'admin/auth/signin.twig');
    }

    public function postSignin(Request $request, Response $response, $args)
    {
        $req = $request->getParsedBody();

        $hashed_password = hash('sha1',$req['password']);

        $query = "SELECT * FROM users WHERE email =:email AND password=:password";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'email'     => $req['email'],
            'password'  => $hashed_password,
        ]);

        $isExist    = $stmt->rowCount();
        $userData   = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($isExist == 1) {
            $this->session->set('auth', $userData);
            print_r($this->session->get('auth'));
        }else{

        }
    }
}