<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',TextType::class, [
            'label'=> 'Titre du quiz',
            'attr'=> [
                'placeholder'=> 'Choose title for your quiz',
                'class'=>'form-control'
            ],
        ])
        ->add('image',TextType::class, [
            'label'=> 'Image de votre quiz',
            'attr'=> [
                'placeholder'=> 'URL de l\'image',
                'class'=>'form-control'
            ],
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
