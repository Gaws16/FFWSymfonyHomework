<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    private readonly array $blogs;

    public function __construct(){
        $this->blogs=[
            1=>[
                'id' => 1,
                'title' => 'The title of the first blog',
                'content' => 'The content of the first blog',
                'author' => 'The author of the first blog',
            ],
           2=> [
                'id' => 2,
                'title' => 'The title of the second blog',
                'content' => 'The content of the second blog',
                'author' => 'The author of the second blog',
            ],
           3=> [
                'id' => 3,
                'title' => 'The title of the third blog',
                'content' => 'The content of the third blog',
                'author' => 'The author of the third blog',
            ],
            4=>[
                'id' => 4,
                'title' => 'The title of the fourth blog',
                'content' => 'The content of the fourth blog',
                'author' => 'The author of the fourth blog',
                ]
            ];
           
    }


    #[Route('/blog', name: 'app_blog',)]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'blogs' => $this->blogs,
        ]);
    }
    #[Route('/blog/{id}', name:'app_blog_show')]
    public function GetById($id){
        if(array_key_exists($id, $this->blogs) == false){
            throw $this->createNotFoundException('Blog not found');
        }

        $blog = $this->blogs[$id];
        
        return $this->render('blog/blogById.html.twig',[
        'blog' => $blog]);
    }
}
