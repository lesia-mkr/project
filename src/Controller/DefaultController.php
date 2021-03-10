<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Items;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
        ->getRepository(Articles::class)
        ->findAll(); 
        return $this->render('default/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
