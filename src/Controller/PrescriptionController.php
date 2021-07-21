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
use DateTime;



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
            $em = $this->getDoctrine()->getManager();

            $prescription->setDoctor($form->get('doctor')->getData());
            $prescription->setPatient($form->get('patient')->getData());
            $prescription->setDrug($form->get('drug')->getData());

            $prescriptionInfo = [
                'beginning'=>$form->get('beginning')->getData()->format('d/m/Y'),
                'end'=>$form->get('end')->getData()->format('d/m/Y'),

                'morning'=>$form->get('morning')->getData(),
                'dosagemorning'=>$form->get('dosagemorning')->getData(),

                'noon'=>$form->get('noon')->getData(),
                'dosagenoon'=>$form->get('dosagenoon')->getData(),

                'evening'=>$form->get('evening')->getData(),
                'dosageevening'=>$form->get('dosageevening')->getData(),

                'contraindication'=>$form->get('contraindication')->getData(),
            ];

            $prescription->setAdministration($prescriptionInfo);
            $prescription->setCreated(new DateTime('now'));

            $em->persist($prescription);
            $em->flush();
            return new RedirectResponse($this->generateUrl('home'));
        }

        return $this->render('prescription/index.html.twig', ['form' => $form->createView()]);
    }
}
