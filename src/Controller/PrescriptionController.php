<?php

namespace App\Controller;

use App\Repository\PrescriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Prescription;
use App\Form\NewPrescriptionFormType;


class PrescriptionController extends AbstractController
{
    /**
     * @Route("/prescription", name="prescription")
     */
    public function prescription(Request $request, PrescriptionRepository $prescriptionRepository){
        $prescription = new Prescription();
        $form=$this->createForm(NewPrescriptionFormType::class,$prescription);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

        }

        return $this->render('prescription/index.html.twig', ['form' => $form->createView()]);
    }
}
