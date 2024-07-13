<?php

namespace App\Controller;

use App\Repository\TicketsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ListController extends AbstractController
{
    #[IsGranted('IS_AUTHENTICATED')]
    #[Route('/list', name: 'app_list')]
    public function index(TicketsRepository $repository): Response
    {
        $tickets = $repository->findAll();
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'tickets' => $tickets,
        ]);
    }
}
