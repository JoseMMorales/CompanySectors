<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Sector;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'required'   => false,
                'empty_data' => '',
            ])
            ->add('sectorCompany',EntityType::class,
                array(
                    'class' => 'App:Sector',
                    'choice_label' => 'name',
                    'choice_value' => 'name',
                    'placeholder' => 'Sector',
                    'required'   => false,
                )
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
