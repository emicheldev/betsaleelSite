<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository):Response
    {
        $posts = $postRepository ->findLatestPosts();
        return $this->render('pages/home.html.twig', ['posts' => $posts]);
    }
    
    #[Route('/about', name: 'about')]
    public function about():Response
    {
        return $this->render('pages/about.html.twig', ['title' => 'Test Page']);
    }

    #[Route('/contact-test', name: 'contact-test')]
    public function contact():Response
    {
        return $this->render('pages/contact.html.twig', ['title' => 'Test Page']);
    }

    #[Route('/donate', name: 'donate')]
    public function donate():Response
    {
        return $this->render('pages/donate.html.twig', ['title' => 'Donate']);
    }

    #[Route('/faq', name: 'faq')]
    public function faq():Response
    {
        return $this->render('pages/faq.html.twig', ['title' => 'faq']);
    }

    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function mentionLegale():Response
    {
        return $this->render('pages/mentionslegales.html.twig', ['title' => 'faq']);
    }

    #[Route('/politique-de-confidentialite', name: 'politique-de-confidentialite')]
    public function politiquedeconfidentialite():Response
    {
        return $this->render('pages/politiquedeconfidentialite.html.twig', ['title' => 'faq']);
    }

    #[Route('/rapports-d-activite', name: 'rapports-d-activite')]
    public function Rapportsdactivite():Response
    {
        return $this->render('pages/Rapportsdactivite.html.twig', ['title' => 'rapports-d-activite']);
    }
}
