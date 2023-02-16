<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Tweets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TweetsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu', TextareaType::class, [
                'attr' => ['class' => 'textarea'],
            ])
            // ->add('user_id', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'username',
            //     'label' => 'User'
            // ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Sélection image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tweets::class,
        ]);
    }
}
