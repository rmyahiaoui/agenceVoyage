<?php

namespace App\Form;

use App\Entity\Voyage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class ,[ 'label' => 'Nom','attr' => ['class' => 'form-control','placeholder' =>'Nom']])
            ->add('description', TextareaType::class ,[ 'attr' => ['class' => 'form-control','placeholder' =>'Description']])
            ->add('duree', NumberType::class ,[ 'attr' => ['class' => 'form-control','placeholder' =>'Durrée']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
