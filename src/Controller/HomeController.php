<?php

namespace App\Controller;

use App\Repository\PrescriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Prescription;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PrescriptionRepository $prescriptionRepository): Response
    {
        $prescriptions = $prescriptionRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'prescriptions' => $prescriptions,
        ]);
    }
}
