<?php

namespace App\EventSubscriber;

use App\Service\EventService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class EventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $eventService;

    public function __construct(Environment $twig, EventService $eventService)
    {
        $this->twig = $twig;
        $this->eventService = $eventService;
    }

    public function onKernelController(ControllerEvent $event)
    {
        // Récupérer les événements à venir depuis le service
        $events = $this->eventService->getUpcomingEvents();
        
        // Rendre les événements accessibles globalement dans les templates Twig
        $this->twig->addGlobal('upcoming_events', $events);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
