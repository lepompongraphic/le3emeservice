<?php
namespace App\Form;
// src/Form/PartenaireType.php
use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartenaireType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('nosPartenaire', TextType::class)
		                ->add('prenomPartenaire', TextType::class)
		                ->add('emailPartenaire', EmailType::class)
		                ->add('passwordPartenaire', PasswordType::class)
		                ->add('adressePartenaire', TextType::class)
		                ->add('cpPartenaire', TextType::class)
		                ->add('villePartenaire', TextType::class)
		                ->add('telPartenaire',TextType::class)
		                ->add('civilitePartenaire', ChoiceType::class,
		                	array('choices' => array(
		                		'Madame' => 'f',
		                	    'Monsieur' => 'h'),
		                        'expanded' => true,
		                        'multiple'=> false
					
									)
						)
                     ->add('newsletterPartenaire', ChoiceType::class, 
							array('choices' => array(
											'oui' => 'o',
											'non' => 'n'),
										'expanded' => true,
										'multiple' => false
										)
						);
  

	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
							 array('data_class' => Partenaire::class));
	}
}