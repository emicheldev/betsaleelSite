<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'projets')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findPublishedProjects();
        return $this->render('project/index.html.twig', ['projects' => $projects]);
    }

    #[Route('/projet/{slug}', name: 'show_project')]
    public function projet(string $slug, ProjectRepository $project): Response
    {
        $project = $project->findOneBySlug( $slug);
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }
}
