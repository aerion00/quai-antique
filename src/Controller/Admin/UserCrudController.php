<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Utilisateurs')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Nom'),
            TextField::new('email')
                ->setLabel('Email'),
            TextField::new('phone')
                ->setLabel('Telephone'),
            ChoiceField::new('roles')
                ->setLabel('Compte')
                ->allowMultipleChoices()
                ->renderAsBadges([
                    'ROLE_CLIENT' => 'success',
                    'ROLE_ADMIN' => 'warning'
                ])
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Client' => 'ROLE_CLIENT'
                ]),
        ];
    }

}
