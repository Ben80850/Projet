<?php

namespace App\Controller\Admin;

use App\Entity\Candidatures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CandidaturesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidatures::class;
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
