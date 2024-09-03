<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchexcusesController extends AbstractController
{
    #[Route('/searchexcuses', name: 'app_searchexcuses')]
    public function index(): Response
    {
        return $this->render('searchexcuses/index.html.twig', [
            'controller_name' => 'SearchexcusesController',
        ]);
    }
}
