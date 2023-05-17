<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignUpFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name',
                TextType::class,
                [
                    'label' => 'First Name',
                    'attr' => ['class' => 'form-control'],
                    'row_attr' => ['class' => 'col'],
                ]
            )
            ->add('last_name',
                TextType::class,
                [
                    'label' => 'Last Name',
                    'attr' => ['class' => 'form-control'],
                    'row_attr' => ['class' => 'col mt-1']
                ]
            )
            ->add('email',
                EmailType::class,
                [
                    'attr' => ['class' => 'form-control'],
                    'row_attr' => ['class' => 'col mt-1']
                ]
            )
            ->add('password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Passwords do not match',
                    'first_options' => [
                        'label' => 'Password',
                        'attr' => ['class' => 'form-control', 'placeholder' => 'Please type a password'],
                        'row_attr' => ['class' => 'col mt-1'],
                    ],
                    'second_options' => [
                        'label' => 'Confirm Password',
                        'attr' => ['class' => 'form-control', 'placeholder' => 'Confirm your password'],
                        'row_attr' => ['class' => 'col mt-1'],
                    ]
                ]
            )
            ->add('submit',
                SubmitType::class,
                [
                    'attr' => ['class' => 'btn btn-primary mt-2']
                ]

            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
