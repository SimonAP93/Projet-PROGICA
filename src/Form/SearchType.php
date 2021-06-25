<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class,[
                'required' => false,
                'label' => 'Min Surface',
            ])
            ->add('minBedrooms', IntegerType::class,[
                'required' => false,
                'label' => 'Min Bedrooms',
            ])
            ->add('postalCode',TextType::class,[
                'required'=> false,
                'label' => 'Postal code'
            ])
            ->add('animals', CheckboxType::class,[
                'required' => false,
                'label' => 'Animals'
            ])
            ->add('equipements', EntityType::class,[
                'class' => Equipement::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
