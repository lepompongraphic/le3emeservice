<?php
namespace App\Form;

//src/Form/FormRechercheType.php

use App\Entity\Don;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormRechercheType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {	
    	$builder->add('ville', EntityType::class, array('class' => Don::class, 'choice_label' => 'ville', 'multiple' => false, 'expanded' => false, 'label' => 'Rechercher par ville', 'query_builder' => function (EntityRepository $er) { return $er->createQueryBuilder('u')->groupBy('u.ville');}));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>Don::class));
    }
}