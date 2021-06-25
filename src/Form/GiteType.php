<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class , [
                'required' => false
            ])
            ->add('description', TextareaType::class , [
                'required' => false
            ])
            ->add('address', TextType::class , [
                'required' => false
            ])
            ->add('city', TextType::class , [
                'required' => false
            ])
            ->add('rooms', NumberType::class , [
                'required' => false
            ])
            ->add('surface', NumberType::class , [
                'required' => false
            ])
            ->add('animals', CheckboxType::class , [
                'required' => false
            ])
            ->add('postalCode', TextType::class , [
                'required' => false
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Add an image'
            ])
            ->add('equipements', EntityType::class,[
                'class' => Equipement::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
