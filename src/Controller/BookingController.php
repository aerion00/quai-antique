<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Parameter;
use App\Form\Booking2StepType;
use App\Form\Booking3MemberStepType;
use App\Form\Booking3NoMemberStepType;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use App\Repository\ParameterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{

    private $entityManager;

    public function __construct(private ManagerRegistry $doctrine, BookingRepository $bookingRepository, EntityManagerInterface $entityManager, ParameterRepository $parametersRepository)
    {
        $this->parameters = $parametersRepository;
        $this->entityManager = $entityManager;
        $this->booking = $bookingRepository;
    }

    #[Route('/reservation', name: 'app_booking')]
    public function firstFormAction(Request $request, SessionInterface $session): Response
    {

        $session->remove('booking');

        $booking = new Booking;

        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $session->set('booking', $data);
            return $this->redirectToRoute('app_booking2'); // rediriger vers le deuxième formulaire
        }

        // Les horaires sur la homepage et la carte
        $openDay = $this->entityManager->getRepository(parameter::class)->findById('1');

        return $this->render('booking/index.html.twig', [
            'newBooking' => $booking,
            'firstStepBooking' => $form->createView(),
            'parameters' => $openDay
        ]);
    }

    #[Route('/reservation-etape-2', name: 'app_booking2')]
    public function indexStep2(Request $request, SessionInterface $session): Response
    {

        // Les horaires sur la homepage et la carte
        $openDay = $this->entityManager->getRepository(parameter::class)->findById('1');

        // Récupération des données de la session.
        $data = $session->get('booking');

        /// Importation des paramètres de la boutique
        $shopParameters = $this->entityManager->getRepository(Parameter::class)->findOneById('1');

        // Nombre de places disponibles le midi et le soir
        $numberPlacesLunch = $shopParameters->getNumberOfPlacesLunch();
        $numberPlacesDinner = $shopParameters->getNumberOfPlacesDinner();

        // Récupérer le jour de la réservation
        $dayBooking = $data->getDate();
        $dayOfBooking = $dayBooking->format("l");

        // Créer une nouvelle réservation avec les informations précédantes
        $booking = new Booking();
        $booking->setDate($data->getDate()); // définir la date de réservation avec les données de la session
        $booking->setStep($data->getStep()); // définir la date de réservation avec les données de la session

        $form2 = $this->createForm(Booking2StepType::class, $booking);
        $form2->handleRequest($request);

        /// Compter le nombre de réservations à cette date midi / soir
        $numberBookingMidiDate = $this->booking->getBookingMidi($booking->getDate());
        $numberBookingSoirDate = $this->booking->getBookingSoir($booking->getDate());

        /// Compter le nombre de places restantes disponible
        $numberPlaceFreeLunch = $numberPlacesLunch - count($numberBookingMidiDate);
        $numberPlaceFreeDiner = $numberPlacesDinner - count($numberBookingSoirDate);

        if ($form2->isSubmitted() && $form2->isValid()) {

            $numberBookingPeople = $booking->getNumberOfPeople();
            $moment = $booking->getMoment();

            if ($moment == 'midi' && ($numberPlaceFreeLunch - $numberBookingPeople >= 0)) {
                $data = $form2->getData();
                $session->set('booking', $data);
                $booking->setStep('3');
                $session->get('booking', $data);
                return $this->redirectToRoute('app_booking3'); // rediriger vers le troisième formulaire
            } elseif ($moment == 'dinner' && ($numberPlaceFreeDiner - $numberBookingPeople >= 0)) {
                $data = $form2->getData();
                $session->set('booking', $data);
                $booking->setStep('3');
                $session->get('booking', $data);
                return $this->redirectToRoute('app_booking3'); // rediriger vers le troisième formulaire
            } else {
                $this->addFlash('warning', "Désolé, il n'y a pas assez de place pour votre réservation, merci de recommencer.");
                return $this->redirectToRoute('app_booking2');
            }



        }

        return $this->render('booking/index.html.twig', [
            'newBooking' => $booking,
            'secondStepBooking' => $form2->createView(),
            'shopParameters' => $shopParameters,
            'bookingOfDayMidi' => $numberBookingMidiDate,
            'bookingOfDaySoir' => $numberBookingSoirDate,
            'bookingDay' => $dayOfBooking,
            'dateBookingTry' => $dayBooking,
            'parameters' => $openDay
        ]);

    }

    #[Route('/reservation-etape-3', name: 'app_booking3')]
    public function indexStep3(Request $request, SessionInterface $session): Response
    {

        // Les horaires sur la homepage et la carte
        $openDay = $this->entityManager->getRepository(parameter::class)->findById('1');

        $data = $session->get('booking'); // récupérer les données de la session
        $booking = new Booking(); // créer un nouvel objet Booking
        $booking->setDate($data->getDate());
        $booking->setStep($data->getStep());
        $booking->setMoment($data->getMoment());
        $booking->setNumberOfPeople($data->getNumberOfPeople());

        // Création d'un formulaire pour les utilisateurs non membre.
        $form3 = $this->createForm(Booking3NoMemberStepType::class, $booking, [
            'my_option' => $booking->getMoment()
        ]);

        $form3->handleRequest($request);

        if ($form3->isSubmitted() && $form3->isValid()) {
            $doctrine = $this->doctrine->getManager();
            $doctrine->persist($booking);
            $doctrine->flush();
            $this->addFlash('success', 'Votre réservation est validée ! A très bientôt ! ');
            return $this->redirectToRoute('app_home');
        }

        // Création d'un formulaire pour les utilisateurs membre.

        $user = $this->getUser();

        if (!empty($user)) {

            $form4 = $this->createForm(Booking3MemberStepType::class, $booking, [
                'my_option' => $booking->getMoment(),
                'myUser' => $user
            ]);

            $form4->handleRequest($request);

            if ($form4->isSubmitted() && $form4->isValid()) {
                $booking->setUser($user);
                $doctrine = $this->doctrine->getManager();
                $doctrine->persist($booking);
                $doctrine->flush();
                $this->addFlash('success', 'Votre réservation est validée, vous pouvez la retrouver dans votre espace réservation ! A très bientôt ! ');
                return $this->redirectToRoute('app_account');
            }



        }

        if (!empty($user)) {

            return $this->render('booking/index.html.twig', [
                'newBooking' => $booking,
                'thirdStepBooking' => $form3->createView(),
                'fourthStepBooking' => $form4->createView(),
                'parameters' => $openDay
            ]);

        } else {
            return $this->render('booking/index.html.twig', [
                'newBooking' => $booking,
                'thirdStepBooking' => $form3->createView(),
                'parameters' => $openDay
            ]);
        }

    }


}
