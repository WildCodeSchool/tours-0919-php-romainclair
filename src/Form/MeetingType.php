<?php

namespace App\Form;

use App\Entity\Meeting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeetingType extends AbstractType
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
            ->add('meeting', null, ['choice_label' => 'name','label' => 'Requirements(link to other meeting)']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meeting::class,
        ]);
    }
}
