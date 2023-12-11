<?php

namespace App\Controller;

use App\Entity\Color;
use App\Entity\Figure;
use App\Entity\UserData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends AbstractController
{
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        /**
         * @Route("/user", name="user")
         */
        $this->entityManager = $entityManager;
        $repositoryC = $this->entityManager->getRepository(Color::class);
        $colors = $repositoryC->findAll();
        $colorNames=[];
        foreach ($colors as $color) {
            $colorNames[] = $color->getColorName();
        }

        $repositoryF = $this->entityManager->getRepository(Figure::class);
        $figures = $repositoryF->findAll();
        $figureNames =[];
        foreach ($figures as $figure) {
            $figureNames[] = $figure->getFigureName();
        }

        $userData = new UserData();
        $user = $this->createFormBuilder($userData)
            ->add('textField', TextareaType::class)
            ->add('emailField', EmailType::class, [
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
            ->add('colorField', ChoiceType::class, options: [
                'choices' => [
                    $colorNames[0] => $colorNames[0],
                    $colorNames[1] => $colorNames[1],
                    $colorNames[2] => $colorNames[2],
                    $colorNames[3] => $colorNames[3],
                ]
            ])
            ->add('shapeField', ChoiceType::class, [
                'choices' => [
                    $figureNames[0] => $figureNames[0],
                    $figureNames[1] => $figureNames[1],
                    $figureNames[2] => $figureNames[2],
                    $figureNames[3] => $figureNames[3],
                ]
            ])
            ->add('imageField', FileType::class, [
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
                'label' => 'Сохранить',])
        ->getForm();
        $user->handleRequest($request);

        if ($user->isSubmitted() && $user->isValid())
        {
            $ar = array();
            $images = $user->get('imageField')->getData();
            foreach ($images as $image)
            {
                $newFileName = uniqid().'.'.$image->guessExtension();

                try {
                    $image->move(
                      $this->getParameter('images_directory'),
                      $newFileName
                    );
                }catch (FileException $e){
                    $this->addFlash('Error', 'Не получилось сохранить фотографии');
                }
                $ar[] = $newFileName;
            }
            $userData->setImageField($ar);
            $entityManager->persist($userData);
            $entityManager->flush();

            //$this->addFlash('success', 'Данные успешно сохранены!');
            return $this->redirectToRoute('user_test');
        }
        return $this->render('userInput.html.twig',[
           'user' => $user->createView(),
        ]);
    }
}