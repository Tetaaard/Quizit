<?php

namespace App\Form;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', QuestionFormType::class, [
                'label'=> 'Votre Quiz'
            ])
            ->add('content',TextType::class, [
                'label'=> 'Reponse',
                'attr'=> [
                    'placeholder'=> 'Réponse attendue',
                    'class'=>'form-control'
                ],
            ])
            ->add('badContent1',TextType::class, [
                'label'=> 'Reponse',
                'attr'=> [
                    'placeholder'=> 'Réponse fausse',
                    'class'=>'form-control'
                ],
            ])
            ->add('badContent2',TextType::class, [
                'label'=> 'Reponse',
                'attr'=> [
                    'placeholder'=> 'Réponse fausse',
                    'class'=>'form-control'
                ],
            ])
            // ->add('content', CollectionType::class, [
            // // each entry in the array will be an "reponse" field
            // 'entry_type' => ReponseType::class,
            // // these options are passed to each "reponse" type
            // 'entry_options' => [
            //     'attr' => ['class' => 'reponse-box'
            //         ],
            //     ],
            // ])
            // ->add('reponseExpected')      
        ;   
    }
    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}
