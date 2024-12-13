<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    #[Route('/events', name: 'events')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findPublishedevents();
        return $this->render('event/index.html.twig',['events' => $events]);
    }

    #[Route('/event/{slug}', name: 'show_event')]
    public function show(string $slug, eventRepository $eventRepository): Response
    {
        $event = $eventRepository->findOneBySlug( $slug);

        if (!$event) {
            throw $this->createNotFoundException('Article non trouvé');
        }

        return $this->render('event/show.html.twig', [
            'event' => $event,
        ]);
    }
}
