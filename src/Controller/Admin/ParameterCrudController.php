<?php

namespace App\Controller\Admin;

use App\Entity\Parameter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class ParameterCrudController extends AbstractCrudController
{

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Paramètres du restaurant')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ;
    }

    public static function getEntityFqcn(): string
    {
        return Parameter::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('openMon')
                ->setLabel('Lundi'),
            BooleanField::new('openThu')
                ->setLabel('Mardi'),
            BooleanField::new('openWed')
                ->setLabel('Mercredi'),
            BooleanField::new('openThur')
                ->setLabel('Jeu'),
            BooleanField::new('openFri')
                ->setLabel('Vendredi'),
            BooleanField::new('openSat')
                ->setLabel('Samedi'),
            BooleanField::new('openMon')
                ->setLabel('Dimanche'),
            IntegerField::new('numberOfPlacesLunch')
                ->setLabel('Places déjeuner'),
            IntegerField::new('numberOfPlacesDinner')
                ->setLabel('Places dinner'),
            TextareaField::new('scheduleCms')
                ->setLabel('Horaires sur le site')
        ];
    }

}
