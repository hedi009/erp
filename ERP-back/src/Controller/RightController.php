<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RightController extends AbstractController
{
    /**
     * @Route("/right", name="app_right")
     */
    public function index(): Response
    {
        return $this->render('right/index.html.twig', [
            'controller_name' => 'RightController',
        ]);
    }
}
