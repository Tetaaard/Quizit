<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('categorie', QuizFormType::class)
            ->add('content',TextType::class, [
                'label'=> 'Question',
                'attr'=> [
                    'placeholder'=> 'Enter your question',
                    'class'=>'form-control'
                ],
            ])
            ;
    }
    public function getParent()
    {
        return CategorieFormType::class;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
