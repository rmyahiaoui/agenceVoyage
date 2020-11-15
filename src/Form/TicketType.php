<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure',TextType::class ,[ 'label' => 'Depart','attr' => ['class' => 'form-control','placeholder' =>'Depart']])
            ->add('arrival',TextType::class ,[ 'label' => 'Arrivé','attr' => ['class' => 'form-control','placeholder' =>'Arrivé']])
            ->add('seat',TextType::class ,[ 'label' => 'Siege','attr' => ['class' => 'form-control','placeholder' =>'Siege']])
            ->add('type', ChoiceType::class, [
                'choices'=>  [
                     'Avion'    => 1,
                     'Bus'      =>2,
                     'Train'    =>3,
                     'Bateau'   =>4,
                ],
                'attr' => ['class' => 'form-control']

            ])
            ->add('number',TextType::class ,[ 'label' => 'Numéro','attr' => ['class' => 'form-control','placeholder' =>'Numéro']])
            ->add('gate',TextType::class ,[ 'label' => 'Gate','attr' => ['class' => 'form-control','placeholder' =>'Gate']])
            ->add('baggageDrop',TextType::class ,[ 'label' => 'BaggageDrop','attr' => ['class' => 'form-control','placeholder' =>'BaggageDrop']])
            ->add('departureDate', DateTimeType::class, [
                'label' => 'Date de depart'
            ])
            ->add('arrivalDate', DateTimeType::class, [
                'label' => 'Date d\'arriver'
            ])
            ->add('voyage', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
