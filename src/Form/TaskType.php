<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Task;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label'=> "Name",
                'attr'=>[
                    'placeholder'=>"Enter Name",


                ]])
               
->add('description')
->add('result')
->add('date', DateType::class,[
    'html5' => false,
])
            ->add('category', EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder'=>'choose your category',
                'label' => 'Category',
                'placeholder' => 'choice category',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Submit task',
                'attr' => [
                    'class' => 'btn btn-primary', 
                ],
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}