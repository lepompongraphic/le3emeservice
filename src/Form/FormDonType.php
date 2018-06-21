<?php
namespace App\Form;
//src/Form/FormDonType.php
use App\Entity\Don;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormDonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', TextareaType::class)
                ->add('dateEntree', DateType::class)
                ->add('heureCollecte', TextType::class)
                ->add('reserver', ChoiceType::class,
            			array('choices'=>array('oui'=>'o',
	                                      		'non'=>'n'),
		                                      'expanded'=> true, 
		                                      'multiple'=> false));

          
            }

     public function configureOptions(OptionsResolver $resolver)

    {
        $resolver->setDefaults(array('data_class'=>Don::class));
            
    }



}