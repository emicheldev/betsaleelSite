<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\EventService;

class HeaderController extends AbstractController
{
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function header(): Response
    {
        $events = $this->eventService->getUpcomingEvents();
        
        return $this->render('partials/_promotion.html.twig', [
            'events' => $events,
        ]);
    }
}
