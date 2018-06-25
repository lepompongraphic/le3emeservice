<?php
namespace App\Form;

//src/Form/FormType.php

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array('label' => 'Email'))
                ->add('mdp', PasswordType::class, array('label' => 'Mot de passe'))
                ->add('raisonSocial', TextType::class, array('label' => 'Raison sociale'))
                ->add('siret', TextType::class, array('label' => 'N° Siret'))
                ->add('adresse', TextType::class, array('label' => 'Adresse'))
                ->add('cp', TextType::class, array('label' => 'Code Postal'))
                ->add('ville', TextType::class, array('label' => 'Ville'))
                ->add('tel', TextType::class, array('label' => 'Telephone'))
                ->add('statut', ChoiceType::class,
                  array('choices'=>array('Association'=>'a',
                                      'Professionnel'=>'p'),
                                      'expanded'=> true, 
                                      'multiple'=> false, 'label' => 'Statut'));      
    }

     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>Membre::class));
    }
}
