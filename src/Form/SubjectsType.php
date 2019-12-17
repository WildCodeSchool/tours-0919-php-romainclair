<?php

namespace App\Form;

use App\Entity\Subjects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description', TextareaType::class)
            ->add('requirements')
            ->add('image')
            ->add('participation', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],   
            ])
        ;
        $options;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subjects::class,
        ]);
    }
}
