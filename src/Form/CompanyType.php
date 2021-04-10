<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Sector;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('phone', null, [
                'required'   => false,
                'empty_data' => '',
            ])
            ->add('email', null, [
                'required'   => false,
                'empty_data' => '',
            ])
            ->add('sectorCompany',EntityType::class,
                array(
                    'class' => 'App:Sector',
                    'choice_label' => 'name',
                    'choice_value' => 'id',
                    'placeholder' => 'Choose a sector',
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
