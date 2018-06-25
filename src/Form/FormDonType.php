<?php
namespace App\Form;

/* src/Form/FormDonType.php */

use App\Entity\Don;
use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormDonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', TextareaType::class, array('label' => 'Description'))
                ->add('dateEntree', DateType::class, array('format' => 'ddMMyyyy', 'label' => 'Date de mise à disposition'))
                ->add('commentaires', TextareaType::class, array('label' => 'Commentaires (date ou heure limite de retrait,...)'));
    }

     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>Don::class));
    }
}