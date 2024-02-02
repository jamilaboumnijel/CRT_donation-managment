<?php

namespace App\Form;

use App\Entity\Donate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DonateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('created_At', DateTimeType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('created_By', TextType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('quantity', IntegerType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'isk-h-8 isk-w-full isk-px-3 isk-py-2.5 isk-text-sm isk-rounded-lg'
                ],
                'label_attr' => [
                    'class' => ''
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Donate::class,
        ]);
    }
}
