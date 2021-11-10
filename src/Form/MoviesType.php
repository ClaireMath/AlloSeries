<?php

namespace App\Form;

use App\Entity\Actors;
use App\Entity\Director;
use App\Entity\Movies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MoviesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('sumary')
            ->add('image')
            ->add('release_year')
            ->add('created_at')
            ->add('actorss')
        ;
        $builder->add('actorss', EntityType::class, [
            // looks for choices from this entity
            'class' => Actors::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'last_name',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ]);
        $builder->add('director', EntityType::class, [
            // looks for choices from this entity
            'class' => Director::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'last_name',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movies::class,
        ]);
    }
}
