<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class,[
                'row_attr' => ['class' => 'col mb-2'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('last_name', TextType::class, [
                'row_attr' => ['class' => 'col mb-2'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', EmailType::class, [
                'row_attr' => ['class' => 'col mb-2'],
                'attr' => ['class' => 'form-control', 'disabled' => true],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Update Account',
                'row_attr' => ['class' => 'col mt-3'],
                'attr' => ['class' => 'btn btn-primary'],
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
