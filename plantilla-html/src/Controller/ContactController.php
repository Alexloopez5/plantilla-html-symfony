<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $contact = new Contact();
        $form = $this ->createForm(ContactFormType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form ->isValid()){
            $contacto = $form ->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contacto);
            $entityManager->flush();
            return $this ->redirectToRoute('thankyou',[]);
        }
        return $this->render('contact/index.html.twig', array('form'=>$form->createView()));
    }

    #[Route('/thankyou', name: 'thankyou')]
    public function thankyou(): Response{
        return $this->render('contact/thankyou.html.twig');
    }

}
