<?php

namespace App\Controller;

use App\Entity\UserData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TableController extends AbstractController
{
    public function table(EntityManagerInterface $entityManager): Response
    {
        $data = $entityManager->getRepository(UserData::class)->findAll();
        return $this->render('add_page.html.twig',[
           'data' =>$data,
    ]);
    }
}