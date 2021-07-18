<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrescriptionController extends AbstractController
{
    /**
     * @Route("/", name="prescription")
     */
    public function index(): Response
    {
        return $this->render('prescription/index.html.twig', [
            'controller_name' => 'PrescriptionController',
        ]);
    }
}
