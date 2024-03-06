<?php

namespace App\Form;

use App\Entity\Family;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BooleanType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('familyName',TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        
        ->add('adress', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('phone', IntegerType::class, [
            'attr' => [],
            'label_attr' => []
        ]) 
        ->add('composition', IntegerType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('Accommodation', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('Father_Profession', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('mother_Profession', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('Insurance', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ->add('Health_Status', TextType::class, [
            'attr' => [],
            'label_attr' => []
        ])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Family::class,
        ]);
    }
}
