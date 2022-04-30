<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Article;
use App\Entity\Category;

class DashboardController extends AbstractDashboardController
{
    /// ? = On autorise la valeur nulle 
    public function __construct(private ?AdminUrlGenerator $adminUrlGenerator)
    {

    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        $url = $this->adminUrlGenerator->setController(ArticleCrudController::class)->generateUrl();
        return $this->redirect($url);
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord Blog Vincent');
    }

    // On configure les liens qu'il y'a dans le menu 
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Articles', 'fa fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Tous les articles','fa fa-newspaper',Article::class),
            MenuItem::linkToCrud('Ajouter','fa fa-plus',Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier','fa fa-pen',Article::class)->setAction(Crud::PAGE_EDIT),
            MenuItem::linkToCrud('Categories','fa fa-list',Category::class)



        ]
    );

    }
}
