<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CurrencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('from',ChoiceType::class, [
            'choices' => [
            'USD' => 'USD',
            'EUR' => 'EUR',
            'GBP' => 'GBP',
            ],
            'placeholder' => 'Choose currency...',
        ])
        ->add('to',ChoiceType::class, [
            'choices' => [
            'USD' => 'USD',
            'EUR' => 'EUR',
            'GBP' => 'GBP',
            ],
            'placeholder' => 'Choose currency...',
        ])
        ->add('amount', IntegerType::class)
        ->add('date', DateType::class, [
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'exchange_currency' => Currency::class,
        ]);
    }
}
