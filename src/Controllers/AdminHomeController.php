<?php

namespace Pamit\Controllers;

use Pamit\Core\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
* Admin
*/
class AdminHomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {

        return $this->view->render($response, 'admin/home.twig');
    }
}