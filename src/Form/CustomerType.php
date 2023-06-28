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
                'label' => 'Név'
            ))
            ->add('email', EmailType::class, array(
                'required' => false,
                'label' => 'E-mail'
            ))
            ->add('content', TextareaType::class, array(
                'required' => false,
                'label' => 'Üzenet szövege'
            ))
            ->add('send', SubmitType::class, array(
                'attr' => array('class' => 'send'),
                'label' => 'Küldés'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
