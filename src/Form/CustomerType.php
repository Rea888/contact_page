<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'required' => false,
                'attr' => array(
                    'placeholder' => ' Name',
                ),
            ))
            ->add('email', EmailType::class, array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'E-mail',
                ),
            ))
            ->add('content', TextareaType::class, array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Message',
                    'style' => 'padding-top:10px;',
                ),
            ))
            ->add('send', SubmitType::class, array(
                'label' => 'Send'
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
