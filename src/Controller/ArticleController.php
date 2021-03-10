<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Authors;
use App\Entity\Items;
use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
     /**
     * @Route("/article", name="article")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Articles::class)
            ->findAll(); 
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll(); 
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
    
    /**
     * @Route("/article/{category}", name="articles_by_category", requirements={"category"="\w{6}"}) 
     */
    public function byCategory($category){ 

        $categories = $this->getDoctrine() 
            ->getRepository(Categories::class) 
            ->findAll(); 
        $articles_by_cat = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findByName($category);
        return $this->render('article/indexcat.html.twig', [
            'categories' => $categories,
            'articles_by_cat' => $articles_by_cat
        ]);
    }

    /**
     * @Route("/article/{name}", name="article_by_id")
     */
    public function byId($name){
        $article = $this->getDoctrine()
            ->getRepository(Articles::class)
            ->find($name); 
        $categories = $this->getDoctrine()
                ->getRepository(Categories::class)
                ->findAll(); 
        return $this->render('article/article.html.twig', [
            'article' => $article,
            'name' => $name,
            'categories' => $categories
        ]);
    }
    
}
