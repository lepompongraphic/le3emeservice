<?php
namespace App\Form;

//src/Form/LoginType.php

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array('label' => 'Email'))
                ->add('mdp', PasswordType::class, array('label' => 'Mot de passe'));
    }

     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Membre::class));
    }
}