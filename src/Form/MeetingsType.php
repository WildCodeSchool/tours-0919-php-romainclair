<?php

namespace App\Form;

use App\Entity\Meetings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeetingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = [];
        $builder
            ->add('name')
            ->add('description')
            ->add('required')
            ->add('participating')
            ->add('subjects', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meetings::class,
        ]);
    }
}
