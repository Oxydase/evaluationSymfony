<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
{
    return [
        IdField::new('id')->onlyOnIndex(),
        TextField::new('email'),
        TextField::new('nom'),
        TextField::new('prenom'),

        ChoiceField::new('roles')
            ->setChoices([
                'Conseiller' => 'ROLE_ADMIN',
                'Candidat' => 'ROLE_USER',
            ])
            ->allowMultipleChoices()
            ->renderExpanded() // ou ->renderAsBadges()
    ];
}
}
