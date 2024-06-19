<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlayerController extends AbstractController
{
    #[Route('/player', name: 'app_player_browse', methods:"GET")]
    #[Route('/', name: 'app_player_home', methods:"GET")]
    public function browse(): Response
    {
        return $this->render('player/browse.html.twig');
    }

    #[Route('/player/{id}', name: 'app_player_read', methods:"GET", requirements: ["id" => "\d+"])]
    public function read(): Response
    {
        return $this->render('player/read.html.twig');
    }


}
