<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Categorie', CatFormType::class, [
            'label'=> 'Categorie de Votre QUiz'
        ])
        ->add('question1', RepFormType::class, [
            'label'=> 'Question 1'
        ])
        ->add('question2', RepFormType::class, [
            'label'=> 'Question 2'
        ])
        ->add('question3', RepFormType::class, [
            'label'=> 'Question 3'
        ])
        ->add('question4', RepFormType::class, [
            'label'=> 'Question 4'
        ])
        ->add('question5', RepFormType::class, [
            'label'=> 'Question 5'
        ])
        ->add('question6', RepFormType::class, [
            'label'=> 'Question 6'
        ])
        ->add('question7', RepFormType::class, [
            'label'=> 'Question 7'
        ])
        ->add('question8', RepFormType::class, [
            'label'=> 'Question 8'
        ])
        ->add('question9', RepFormType::class, [
            'label'=> 'Question 9'
        ])
        ->add('question10', RepFormType::class, [
            'label'=> 'Question 10'
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
