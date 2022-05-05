<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        /// Champs qui s'afficheront dans le dashboard 
        // pour l'article 
        return [
           /// IdField::new('id'),
            TextField::new('title'),
            TextField::new('slug'),
            TextField::new('description'),
            TextEditorField::new('content'),
            DateField::new('createdAt')->hideOnForm(),
            DateField::new('updatedAt')->hideOnForm(),
            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('image')
            ->setBasePath('/upload/images')
            ->setUploadDir('/public/upload/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired('false'),
            /// champ associé à la catégorie 
            AssociationField::new('category'),

        ];
    }
    
}
