<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Schedule;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Booking3NoMemberStepType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, ScheduleRepository $schedule)
    {
        $this->entityManager  = $entityManager;
        $this->schedule = $schedule;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $myVariable = $options['my_option'];

        $builder
            ->add('infos', TextareaType::class, [
                'label' => 'Informations allergènes du groupe'
            ])
            ->add('nameBooking', TextType::class, [
                'label' => 'Nom de la réservation'
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Valider la réservation",
                'attr' => [
                    'class' => 'btn btn-sm btn-success',
                ]])
        ;

        if ($myVariable == 'midi') {
            $builder->add('hour', EntityType::class, [
                'label' => 'Choix de l\'heure d\'arrivé',
                'class' => Schedule::class,
                'query_builder' => function ($repository) use ($myVariable) {
                    return $repository->createQueryBuilder('c')
                        ->andWhere('c.timeOfTheDay = :timeOfTheDay')
                        ->setParameter('timeOfTheDay', $myVariable);
                },
                'choice_label' => function ($schedule) {
                    return $schedule->getHour() ?: 'Select an hour';
                },
            ]);
        } elseif ($myVariable == 'dinner') {
            $builder->add('hour', EntityType::class, [
                'label' => 'Choix de l\'heure d\'arrivé',
                'class' => Schedule::class,
                'query_builder' => function ($repository) use ($myVariable) {
                    return $repository->createQueryBuilder('c')
                        ->andWhere('c.timeOfTheDay = :timeOfTheDay')
                        ->setParameter('timeOfTheDay', $myVariable)
                        ->orderBy('c.id', 'ASC');
                },
                'choice_label' => function ($schedule) {
                    return $schedule->getHour() ?: 'Select an hour';
                },
            ]);
        }


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
            'my_option' => null, // Ajouter cette ligne
        ]);
    }
}
