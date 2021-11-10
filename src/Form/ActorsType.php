<?php

namespace App\Form;

use App\Entity\Actors;
use App\Entity\Movies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class ActorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('date_of_birth', BirthdayType::class)
            ->add('bio')
            ->add('filmography')
        ;
        $builder->add('filmography', EntityType::class, [
            // looks for choices from this entity
            'class' => Movies::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'title',

            // used to render a select box, check boxes or radios
            'multiple' => true,
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actors::class,
        ]);
    }
}
