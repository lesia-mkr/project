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
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccountController extends AbstractController
{
    /**
    * @Route("/login", name="login")
    */

    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();

        return $this->render('account/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    /**
    * @Route("/account", name="account")
    */
    
    public function formItem(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll(); 
        return $this->render('account/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    
    /**
    * @Route("/account/items", name="account-items")
    */
    
    public function showItems(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $items = $this->getDoctrine()
            ->getRepository(Items::class)
            ->findAll(); 
        return $this->render('account/itemstab.html.twig', [
            'items' => $items,
        ]);
    }
}
