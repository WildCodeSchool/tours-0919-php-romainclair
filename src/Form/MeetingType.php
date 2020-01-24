<?php

namespace App\Form;

use App\Entity\Meeting;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MeetingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = [];
        $builder
            ->add('name', null, ['label' => 'Nom'])
            ->add('description', null, ['label' => 'Description'])
            ->add('required')
            ->add('participating')
            ->add('subject', null, ['choice_label' => 'name'])
            ->add('meeting', null, ['choice_label' => 'name','label' => 'Requirements(link to other meeting)'])
            ->add('meetingDates', DateTimeType::class, ['date_label' => 'Starts On']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meeting::class,
        ]);
    }
}
