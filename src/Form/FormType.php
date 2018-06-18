<?php
namespace App\Form;
//src/Form/FormType.php
use App\Entity\Professionnel;
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
        $builder->add('emailProfessionnel', EmailType::class)
                ->add('mdpProfessionnel', PasswordType::class)
                ->add('raisonSocialProfessionnel', TextType::class)
                ->add('siretProfessionnel', TextType::class)
                ->add('adresseProfessionnel', TextType::class)
                ->add('cpProfessionnel', TextType::class)
                ->add('villeProfessionnel', TextType::class)
                ->add('cpProfessionnel', TextType::class)
                ->add('telProfessionnel', TextType::class)
                ->add('statutProfessionnel', ChoiceType::class,
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