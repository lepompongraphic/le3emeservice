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
        $builder->add('email', EmailType::class)
                ->add('mdp', PasswordType::class)
                ->add('raisonSocial', TextType::class)
                ->add('siret', TextType::class)
                ->add('adresse', TextType::class)
                ->add('cp', TextType::class)
                ->add('ville', TextType::class)
                ->add('cp', TextType::class)
                ->add('tel', TextType::class)
                ->add('statut', ChoiceType::class,
                array('choices'=>array('association'=>'a',
                                      'professionnel'=>'p'),
                                      'expanded'=> true, 
                                      'multiple'=> false))
                ->add('isActive', ChoiceType::class,
                      array('choices'=>array('connecté'=>'c',
                                            'deconnecté'=>'d'),
                                            'expanded'=> true, 
                                            'multiple'=> false))
                ->add('roles', ChoiceType::class,
                array('choices'=>array('admin'=>'a',
                                      'user'=>'u'),
                                      'expanded'=> true, 
                                      'multiple'=> false));
          
            }

     public function configureOptions(OptionsResolver $resolver)

    {
        $resolver->setDefaults(array('data_class'=>FormType::class));
            
    }




}