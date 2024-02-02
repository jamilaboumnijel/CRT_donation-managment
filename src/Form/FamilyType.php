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
            'attr' => [
                'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => [ 'class' => ''  ]
        ])
        
        ->add('adress', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg',],
            'label_attr' => ['class' => '']
        ])
        ->add('phone', IntegerType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ]) 
        ->add('composition', IntegerType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ])
        ->add('Accommodation', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ])
        ->add('Father_Profession', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ])
        ->add('mother_Profession', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ])
        ->add('Insurance', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
        ])
        ->add('Health_Status', TextType::class, [
            'attr' => ['class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'],
            'label_attr' => ['class' => '']
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
