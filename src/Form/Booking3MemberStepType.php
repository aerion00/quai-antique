<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Schedule;
use App\Entity\User;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class Booking3MemberStepType extends AbstractType
{
    private $entityManager;
    private Security $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security, ScheduleRepository $schedule)
    {
        $this->entityManager  = $entityManager;
        $this->schedule = $schedule;
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $myVariable = $options['my_option'];
        $myUser = $options['myUser'];

        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'label' => 'Nom de la réservation',
                'choice_label' => 'name',
                'choice_value' => 'id',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
                'data' => $myUser,
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Valider la réservation",
                'attr' => [
                    'class' => 'btn btn-sm btn-success',
                ]])
        ;

        if (isset($myUser)){

            if ($myUser->getAllergy()) {
                $builder
                    ->add('infos', TextareaType::class, [
                        'label' => 'Informations allergènes du groupe',
                        'data' => $myUser->getAllergy(),
                    ]);

            }

        } else {

        }

        if ($myVariable == 'midi') {
            $builder->add('hour', EntityType::class, [
                'class' => Schedule::class,
                'label' => 'Choix de l\'heure d\'arrivé',
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
                'class' => Schedule::class,
                'label' => 'Choix de l\'heure d\'arrivé',
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
            'myUser' => null,
        ]);
    }
}
