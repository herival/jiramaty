<?php

namespace App\Controller;

use OpenAI;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchexcusesController extends AbstractController
{
    #[Route('/searchexcuses', name: 'app_searchexcuses', methods:'POST')]
    public function index(Request $request): Response
    {
        $toerana = $request->request->get('toerana');
        $date_fiandoana = $request->request->get('date_fiandoana');
        $date_fiafarana = $request->request->get('date_fiafarana');
        $safidy = $request->request->get('safidy');
        // dd($question);

        $prompt = 'Hamorony antony tena '.$safidy."ito toerana ito ".$toerana." manomboka ny ".$date_fiandoana ."ka hatramin'ny". $date_fiafarana . "avy amin'ny Jirama. Ny antony mahatapaka ny jiro ary manomeza fialantsiny fa ho tapaka ny jiro ao anatin'daty voasoratra ireo. Atao fehezanteny 5.";

        //Implémentation chatgpt

        $myApiKey = $_ENV['OPENAI_KEY'];
        $client = OpenAI::client($myApiKey);

        $result = $client->chat()->create([
            'model' => 'gpt-4o',
            // 'prompt' => $question,
            'max_tokens' => 2048,
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        dd($result);
        return $this->render('searchexcuses/index.html.twig', [
            'controller_name' => 'SearchexcusesController',
        ]);
    }
}
