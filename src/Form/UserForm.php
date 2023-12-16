<?php

namespace App\Form;

use App\Entity\Color;
use App\Entity\Figure;
use App\Entity\UserTable;
use App\Entity\UserText;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class, [
                'label' => 'Текст',
            ])
            ->add('email', EmailType::class, [
                'attr' => ['maxlength' => 255],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Почта обязательна для заполнения'
                    ]),
                    new Email([
                        'message' => 'Некорректный адрес почты'
                    ])
                ]
            ])
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'label' => 'Цвет',
                'required' => false,
                'empty_data' => null,
                'invalid_message' => ''
            ])
            ->add('figure', EntityType::class, [
                'class' => Figure::class,
                'label' => 'Фигура',
                'required' => false,
                'empty_data' => null,
                'invalid_message' => ''
            ])
            ->add('image', FileType::class, [
                'multiple' => true,
                'attr' => [
                    'accept' => '.jpg, .png',
                    'multiple' => true,
                    'max' => 4,
                ],
                'constraints' => array(
                    new Count(array('max'=>4)),
                )
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Сохранить',]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserTable::class,
        ]);
    }
}