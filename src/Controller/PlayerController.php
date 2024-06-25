<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PlayerRepository;
use App\Entity\Player;

class PlayerController extends AbstractController
{
    #[Route('/player', name: 'app_player_browse', methods:"GET")]
    #[Route('/', name: 'app_player_home', methods:"GET")]
    public function browse(PlayerRepository $playerRepo): Response
    {

        //préparer les données
        //ici récupérer les palyers
        //donc on veut faire un select => Repository
        $allPlayers = $playerRepo->findAll();
        //dd($allPlayers);


        return $this->render('player/browse.html.twig', [
            'playerList' => $allPlayers,
        ]);
    }




    #[Route('/player/{id}', name: 'app_player_read', methods:"GET", requirements: ["id" => "\d+"])]
    public function read(Player $player): Response
    {
        //préparer le données
        //récupérer le player qui a l'id fourrni dans l'url
        //on demande de recupérer automatiquement un objet qui correspond a l'id
        //la page 404 est gérée automatiquement


        return $this->render('player/read.html.twig', [
            'player' => $player
        ]);
    }


}
