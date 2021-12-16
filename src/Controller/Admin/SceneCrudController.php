<?php

namespace App\Controller\Admin;

use App\Entity\Scene;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SceneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Scene::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
