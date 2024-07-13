<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Tickets;
use App\Form\TicketsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminController extends AbstractController
{
    #[IsGranted('IS_AUTHENTICATED')]
    #[Route('/admin/{id}', name: 'app_admin', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function index(?Tickets $tickets, Request $request, EntityManagerInterface $manager): Response
    {
        $tickets ??= new Tickets();
        $form = $this->createForm(TicketsType::class, $tickets);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($tickets);
            $manager->flush();
            return $this->redirectToRoute(route: 'app_list');
        }
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form,
        ]);
    }
}
