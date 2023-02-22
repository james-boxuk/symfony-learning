<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control title-selection',
                ],
                'row_attr' => [
                    'class' => 'col'
                ],
                'placeholder' => 'What is your title?',
                'choices' => [
                    'Mr' => 'mr',
                    'Mrs' => 'mrs',
                    'Doctor' => 'doctor',
                    'Master' => 'master',
                    'Ms' => 'ms',
                    'Lord' => 'lord',
                    'Professor' => 'professor',
                    'Other' => 'other',
                ]
            ])
            ->add('other', TextType::class, [
                'label' => 'Other',
                'required' => false,
                'label_attr' => [
                    'class' => 'hidden title-other',
                ],
                'row_attr' => [
                    'class' => 'col mt-2'
                ],
                'attr' => [
                  'class' => 'form-control title-other hidden',
                    'placeholder' => 'What is your title?',
                ],
            ])
            ->add('first_name', TextType::class, [
                'row_attr' => [
                    'class' => 'col mb-2'
                ],
                'label' => 'First Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'What is your first name?',
                ],
            ])
            ->add('last_name', TextType::class, [
                'row_attr' => [
                    'class' => 'col mb-2'
                ],
                'label' => 'Last Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'What is your last name?',
                ],
            ])
            ->add('telephone', TextType::class, [
                'row_attr' => [
                    'class' => 'col mb-2'
                ],
                'label' => 'Telephone',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'What is your telephone number?',
                ],
            ])
            ->add('message', TextareaType::class, [
                'row_attr' => [
                    'class' => 'col mb-2'
                ],
                'label' => 'Message',

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'What is your message?',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send',
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
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
