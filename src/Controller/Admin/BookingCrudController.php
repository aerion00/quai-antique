<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Réservations');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            TextField::new('hour')
                ->setLabel("Heure d'arrivé"),
            IntegerField::new('numberOfPeople')
                ->setLabel('Nombre de place'),
            AssociationField::new('user')
                ->setLabel('Utilisateur')
                ->renderAsNativeWidget(),
            TextField::new('nameBooking')
                ->setLabel('Nom de la réservation'),
            TextareaField::new('infos')
                ->setLabel('Informations sur la réservation'),
        ];
    }

}
