<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Votre nom',
            'attr' => ['placeholder' => 'Entrez votre nom']
        ])
        ->add('email', EmailType::class, [
            'label' => 'Votre email',
            'attr' => ['placeholder' => 'Entrez votre email']
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Votre message',
            'attr' => ['placeholder' => 'Entrez votre message']
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Envoyer',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact ::class,
        ]);
    }
}
