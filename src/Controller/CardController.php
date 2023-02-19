<?php

namespace App\Controller;

use App\Entity\product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/notre-carte', name: 'app_card')]
    public function index(): Response
    {

        $entree = 'Entrée';
        $main = 'Plats principaux';
        $accompaniments = 'Accompagnements';
        $desserts = 'Desserts';
        $drink = 'Nectar';

        $productEntry = $this->entityManager->getRepository(product::class)->getProductByType($entree);
        $productMain = $this->entityManager->getRepository(product::class)->getProductByType($main);
        $productsAccompaniments = $this->entityManager->getRepository(product::class)->getProductByType($accompaniments);
        $productDesserts = $this->entityManager->getRepository(product::class)->getProductByType($desserts);
        $productDrink = $this->entityManager->getRepository(product::class)->getProductByType($drink);

        return $this->render('card/index.html.twig', [
            'productsEntry' => $productEntry,
            'productsMain' => $productMain,
            'productsAccompaniments' => $productsAccompaniments,
            'productsDesserts' => $productDesserts,
            'productsDrink' => $productDrink,
        ]);
    }
}
