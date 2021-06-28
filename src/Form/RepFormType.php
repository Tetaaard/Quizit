<?php

namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder
        //     ->add('content')
        //     ->add('reponseExpected')
        //     ->add('question')
        // ;
        $builder
        // ->add('question', QuestFormType::class, [
        //     'label'=> 'Question'
        // ])
        ->add('reponse1',TextType::class, [
            'label'=> 'Reponse A',
            'attr'=> [
                'placeholder'=> 'Réponse attendue',
                'class'=>'form-control is-valid'
            ],
        ])
        ->add('badreponse1',TextType::class, [
            'label'=> 'Reponse B',
            'attr'=> [
                'placeholder'=> 'Réponse fausse',
                'class'=>'form-control is-invalid'
            ],
        ])
        ->add('badreponse2',TextType::class, [
            'label'=> 'Reponce C',
            'attr'=> [
                'placeholder'=> 'Réponse fausse',
                'class'=>'form-control is-invalid'
            ],
        ])
        ;
    }
    public function getParent()
    {
        return QuestFormType::class;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}
