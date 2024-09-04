<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(? String $response): Response
    {
        $result_test = "Tapaka ny jiro eto Besarety manomboka ny 2024-09-05 ka hatramin'ny 2024-09-06 noho ny antony hamoronana antony tena maika. Ny JIRAMA dia manao asa fanatsarana sy fikojakojana ny tambajotra elektrika. Ity asa ity dia ilaina mba hahazoana antoka ny fahaizan'ny rafitra sy hisorohana ny olana lehibe amin'ny ho avy. Miala tsiny indrindra izahay noho ny fanelingelenana mety hitranga. Misaotra anao noho ny faharetanao sy ny fahatakaran'ny rehetra.";
        return $this->render('home/index.html.twig', [
            'response' => $response,
        ]);
    }
}
