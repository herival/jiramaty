<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use OpenAI;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchexcusesController extends AbstractController
{
    #[Route('/user/mitadyolana', name: 'app_searchexcuses', methods: 'POST')]
    public function index(Request $request, EntityManagerInterface $em, UserRepository $userRepository): Response
    {
        // controle quotas 
        $user = $this->getUser();
        $currentUser = $userRepository->findOneById($user->getId());
        if (($currentUser->getQuotas()) <= 0) {
            $this->addFlash('danger', 'Efa lany ny quotas anao!');
            $this->redirectToRoute('app_home');
        }

        $currentUser->setQuotas(($currentUser->getQuotas()) - 1);
        $em->persist($currentUser);
        $em->flush();

        $toerana = $request->request->get('toerana');
        $date_fiandoana = $request->request->get('date_fiandoana');
        $date_fiafarana = $request->request->get('date_fiafarana');
        $safidy = $request->request->get('safidy');
        // dd($question);
        $toerana_rano = $request->request->get('toerana_rano');
        $date_fiandoana_rano = $request->request->get('date_fiandoana_rano');
        $date_fiafarana_rano = $request->request->get('date_fiafarana_rano');
        $safidy_rano = $request->request->get('safidy_rano');

        if ($toerana_rano != null) {
            $prompt = 'Hamorony antony ' . $safidy_rano . "ito toerana ito " . $toerana . " manomboka ny " . $date_fiandoana_rano . "ka hatramin'ny" . $date_fiafarana_rano . "avy amin'ny Jirama. Ny antony mahatapaka ny rano amin'ny tambazotra ary manomeza fialantsiny mampiomehy fa ho tapaka ny rano ao anatin'daty voasoratra ireo. Atao fehezanteny 5.";
        } else {
            $prompt = 'Hamorony antony tena ' . $safidy . "ito toerana ito " . $toerana . " manomboka ny " . $date_fiandoana . "ka hatramin'ny" . $date_fiafarana . "avy amin'ny Jirama. Ny antony mahatapaka ny jiro ary manomeza fialantsiny mampiomehy fa ho tapaka ny jiro ao anatin'daty voasoratra ireo. Atao fehezanteny 5.";
        }

        //Implémentation chatgpt

        // $myApiKey = $_ENV['OPENAI_KEY'];
        // $client = OpenAI::client($myApiKey);

        // $result = $client->chat()->create([
        //     'model' => 'gpt-4o',
        //     // 'prompt' => $question,
        //     'max_tokens' => 2048,
        //     'messages' => [
        //         ['role' => 'user', 'content' => $prompt],
        //     ],
        // ]);
        // dd($result);
        // $response = $result->choices[0]->message->content;
        // dd($result, $response);
        $result_test = "Tapaka ny jiro eto Besarety manomboka ny 2024-09-05 ka hatramin'ny 2024-09-06 noho ny antony hamoronana antony tena maika. Ny JIRAMA dia manao asa fanatsarana sy fikojakojana ny tambajotra elektrika. Ity asa ity dia ilaina mba hahazoana antoka ny fahaizan'ny rafitra sy hisorohana ny olana lehibe amin'ny ho avy. Miala tsiny indrindra izahay noho ny fanelingelenana mety hitranga. Misaotra anao noho ny faharetanao sy ny fahatakaran'ny rehetra.";

        return $this->forward('App\Controller\HomeController::index', [
            // 'response' => $response,
            'response' => $result_test,
        ]);
    }
}
