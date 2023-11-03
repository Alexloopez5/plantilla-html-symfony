<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
            ->add('name',TextType::class,array(
                'label' => 'Name',
                'attr' => array(
                    'placeholder' => 'Write your name...'
                )
            ))
            ->add('email',EmailType::class,array(
                'label' => 'Email',
                'attr' => array(
                    'placeholder' => 'Write your email...'
                )
            ))
            ->add('subject',TextType::class,array(
                'label' => 'Subject',
                'attr' => array(
                    'placeholder' => 'Subject...'
                )))
            ->add('message',TextareaType::class)
            ->add('Send', SubmitType::class, array('label' => 'Lets Talk'));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
