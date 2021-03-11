<?php

namespace App\Controller;

use App\Entity\Items;
use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ItemsController extends AbstractController
{
    
    /**
     * @Route("/items", name="items")
     */
    public function index(): Response
    {
        $items = $this->getDoctrine()
            ->getRepository(Items::class)
            ->findAll();
            
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll(); 

        return $this->render('item/index.html.twig', [
            'items' => $items,
            'categories' => $categories
        ]);
    }
    /**
     * @Route("/items/createproduct", name="create_product", methods={"POST"})
     */
    public function createProduct( Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $data = $request->request->all();
        
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Items();
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setDescription($data['description']);
        $product->setCount($data['count']);
        $product->setUrl($data['url']);
        $categories = $this->getDoctrine()->getRepository(Categories::class)->find($data['category']);
        $product->setCategories($categories);
        $file = $request->files->get('itemsImg');
            // $file->getSize(); // размер файла
            // $file->getClientOriginalName(); // имя файла
        $file_name =  $data['name'] . '.' . $file->guessExtension();

        $file->move($this->getParameter('items_images'),$file_name);
        
        $entityManager->persist($product);

        $entityManager->flush();
        
        return $this->redirectToRoute('account-items');
    }
    /**
     * @Route("/items/editproduct/{id}", name="edit_priduct", methods={"POST"})
     */
    public function editProduct(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $data = $request->request->all();

        $entityManager = $this->getDoctrine()->getManager();

        $product = $entityManager->getRepository(Items::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setDescription($data['description']);
        $product->setCount($data['count']);
        $product->setUrl($data['url']);
        $categories = $this->getDoctrine()->getRepository(Categories::class)->find($data['category']);
        $product->setCategories($categories);
        
        $entityManager->flush();

        return $this->redirectToRoute('account-items');
    }
    /**
    * @Route("/account/items/del/{id}", name="delitem")
    */
    public function del(Request $request, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $data = $request->request->all();
        $entityManager = $this->getDoctrine()->getManager();
        $item = $entityManager->getRepository(Items::class)->find($id);
        $entityManager->remove($item);
        $entityManager->flush();
        return $this->redirectToRoute('account');
    }

    /**
     * @Route("/items/{id}", name="items_by_id", requirements={"id"="\d+"})
     */
    public function byId($id){
        $item = $this->getDoctrine()
            ->getRepository(Items::class)
            ->find($id);
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();  
        return $this->render('item/item.html.twig', [
            'item' => $item,
            'categories' => $categories
        ]);
    }
    /**
     * @Route("/items/{category}", name="items_by_category", requirements={"category"="\w{6}"}) 
     */
    public function byCategory($category){ // url

        $categories = $this->getDoctrine() // объект Doctrine
            ->getRepository(Categories::class) // объект репозитория
            ->findAll(); // SELECT * FROM CATEGORY;
        $items_by_cat = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findByName($category);
        return $this->render('item/indexcat.html.twig', [
            'categories' => $categories,
            'items_by_cat' => $items_by_cat
        ]);
    }

}
