<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // Sauvegarde en base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Envoi d'un e-mail sécurisé
            $email = (new Email())
                ->from('no-reply@tondomaine.com')  // Utilise une adresse email de ton domaine
                ->to('betsaleel@gmail.com')        // Ton email
                ->replyTo($contact->getEmail())    // Email de la personne pour répondre
                ->subject('Nouveau message de contact')
                ->html($this->renderView('emails/contact.html.twig', [
                    'contact' => $contact
                ]));

            // Envoi de l'email
            $mailer->send($email);

            // Message flash de succès
            $this->addFlash('success', 'Votre message a bien été envoyé.');

            // Redirection après soumission
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
