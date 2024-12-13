<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findPublishedPosts();
        return $this->render('post/index.html.twig',['posts' => $posts]);
    }

    #[Route('/post/{slug}', name: 'show_post')]
    public function show(string $slug, PostRepository $postRepository): Response
    {
        $post = $postRepository->findOneBySlug( $slug);

        if (!$post) {
            throw $this->createNotFoundException('Article non trouvé');
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
