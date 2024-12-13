<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagesDonateTypeController extends AbstractController
{
    #[Route('/pages/donate/type', name: 'app_pages_donate_type')]
    public function index(): Response
    {
        return $this->render('pages_donate_type/index.html.twig', [
            'controller_name' => 'PagesDonateTypeController',
        ]);
    }
}
