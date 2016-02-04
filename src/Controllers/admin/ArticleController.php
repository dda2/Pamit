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
    public function getAddArticle(Request $request, Response $response, $args)
    {

        return $this->view->render($response, 'admin/article/add.twig');

    }

    public function postArticle(Request $request, Response $response, $args)
    {

        $article = $request->getParsedBody();
        $this->validator->rule('required',['title','content','date_post']);
        $this->validator->label([
            'title' => 'Title',
            'content' => 'Content',
            'date_post' => 'Date Post'
            ]);
        if($this->validator->validate()) {
            $query = "INSERT INTO article (title, content, created_at) 
                            VALUES (:title, :content, :created_at)";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':title', $article['title']);
            $stmt->bindParam(':content', $article['content']);
            $stmt->bindParam(':created_at',$article['date_post']);
            // $stmt->bindParam(":image", $article->image);
            $stmt->execute();
        } else {
            foreach($this->validator->errors() as $key => $value){
                $this->flash->addMessage('error', $value[0]);
            }
        }

        $this->flash->addMessage('success', 'Data Berhasil disimpan');

        return $this->view->render($response, 'admin/article/add.twig');
    
    }
}