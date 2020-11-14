<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure')
            ->add('arrival')
            ->add('seat')
            ->add('type', ChoiceType::class, [
                'choices'=>  [
                     'Avion'    => 1,
                     'Bus'      =>2,
                     'Train'    =>3,
                     'Bateau'   =>4,
                ]])
            ->add('number')
            ->add('gate')
            ->add('baggageDrop')
            ->add('departureDate')
            ->add('arrivalDate')
            ->add('step')
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
