<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Entity\Menu;
use App\Entity\product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $entree = 'Entrée';
        $main = 'Plats principaux';
        $accompaniments = 'Accompagnements';
        $desserts = 'Desserts';
        $drink = 'Nectar';

        $gallery = $this->entityManager->getRepository(Gallery::class)->findAll();
        $menus = $this->entityManager->getRepository(Menu::class)->findAll();
        $productEntry = $this->entityManager->getRepository(product::class)->getProductByType($entree);
        $productMain = $this->entityManager->getRepository(product::class)->getProductByType($main);
        $productsAccompaniments = $this->entityManager->getRepository(product::class)->getProductByType($accompaniments);
        $productDesserts = $this->entityManager->getRepository(product::class)->getProductByType($desserts);
        $productDrink = $this->entityManager->getRepository(product::class)->getProductByType($drink);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'gallery' => $gallery,
            'productsEntry' => $productEntry,
            'productsMain' => $productMain,
            'productsAccompaniments' => $productsAccompaniments,
            'productsDesserts' => $productDesserts,
            'productsDrink' => $productDrink,
            'menus' => $menus,
        ]);
    }
}
