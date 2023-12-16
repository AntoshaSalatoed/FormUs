<?php

namespace App\Controller;

use App\Entity\UserTable;
use App\Form\UserForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        /**
         * @Route("/user", name="user")
         */
        $userData = new UserTable();
        $user = $this->createForm(UserForm::class, $userData);
        $user->handleRequest($request);

        if ($user->isSubmitted() && $user->isValid())
        {
            $ar = array();
            $images = $user->get('image')->getData();
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
            $userData->setImage($ar);
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