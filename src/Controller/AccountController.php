<?php

namespace App\Controller;

use App\Form\ChangeInfosType;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{

    private $entityManager;

    public function __construct(BookingRepository $bookingRepository, EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->booking = $bookingRepository;
    }

    #[Route('/mon-compte', name: 'app_account')]
    public function index(Request $request): Response
    {

        // Récupération du module pour modifier les informations sur les allergènes de l'utilisateur.
        $user = $this->getUser();
        $form = $this->createForm(ChangeInfosType::class, $user);
        $form->handleRequest($request);

        // Si le formulaire est okay envoyer les données en BDD
        if ($form->isSubmitted() && $form->isValid()) {

            $this->entityManager->flush();

            $user = $this->getUser();
            $form = $this->createForm(ChangeInfosType::class, $user)->handleRequest($request);

            // Ajout d'un message flash pour valider la modification
            $this->addFlash('success', "Les informations sont modifiés.");

        }

        // Requête pour voir les réservations de l'utilisateur

        $bookingsUser = $this->booking->getBookingUser($user);

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'form' => $form->createView(),
            'bookingsUser' => $bookingsUser
        ]);
    }
}
