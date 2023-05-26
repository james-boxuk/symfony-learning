<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OneTimePinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('one_time_pin', TextType::class,
                [
                    'label' => 'One Time Pin:',
                    'row_attr' => [
                        'class' => 'col mb-2',
                    ],
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Please enter your one time pin'
                    ]
                ]
            )
            ->add('submit', SubmitType::class,[
                'attr' => ['class' => 'btn btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
