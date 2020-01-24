<?php

namespace App\Form;

use App\Entity\Subject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class SubjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => 'Nom'])
            ->add('description', TextareaType::class)
            ->add('requirements', null, ['label' => 'Pré-requis'])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez soumettre une image valide.'
                    ])
                ]
            ])
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
            'data_class' => Subject::class,
        ]);
    }
}
