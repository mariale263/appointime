<?php

namespace App\Form;

use App\Entity\Subsidiary;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SubsidiaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'label' => 'Seleccione Compañia',
                'choice_label' => function ($company) {
                    return $company->getName();
                },
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subsidiary::class,
        ]);
    }
}
