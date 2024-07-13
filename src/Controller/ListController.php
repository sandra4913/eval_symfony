<?php

namespace App\Controller;

use App\Repository\TicketsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(TicketsRepository $repository): Response
    {
        $tickets = $repository->findAll();
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'tickets' => $tickets
        ]);
    }
}
