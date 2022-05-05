<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
class CategoryController extends AbstractController
{
    
    #[Route('/category', name: 'category')]
    /// on met un élément de type Category dans le 
    // constructeur 
    public function index(Category $category): Response
    {
        return $this->render('category/category.html.twig', [
            'controller_name' => 'CategoryController',
            'category'=>$category,
        ]);
    }
}
