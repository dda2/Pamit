<?php

namespace Pamit\Controllers\admin;

use Pamit\Core\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
* Admin
*/
class ArticleController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {

        // $article = $request->getParsedBody();
        // $query = "INSERT INTO article (title, content, image) 
        //                     VALUES (:title, :content, :image)";

        // $stmt = $this->db->prepare($query);
        // $stmt->bindParam("title", $article->title);
        // $stmt->bindParam("content", $article->content);
        // $stmt->bindParam("image", $article->image);
        // $stmt->execute()

        
        return $this->view->render($response, 'admin/article/add.twig');
    }

    public function postArticle(Request $request, Response $response, $args)
    {

        $article = $request->getParsedBody();

        $query = "INSERT INTO article (title, content) 
                            VALUES (:title, :content)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $article['title']);
        $stmt->bindParam(':content', $article['content']);
        // $stmt->bindParam(":image", $article->image);
        $stmt->execute();

        return $this->view->render($response, 'admin/article/add.twig');
    }

        
      
}