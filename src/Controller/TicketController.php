<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\Voyage;
use App\Form\TicketType;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticket")
 */
class TicketController extends AbstractController
{
    /**
     * @Route("/", name="ticket_index", methods={"GET"})
     */
    public function index(TicketRepository $ticketRepository): Response
    {
        return $this->render('ticket/index.html.twig', [
            'tickets' => $ticketRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="ticket_new", methods={"GET","POST"})
     */
    public function new(Request $request, Voyage $voyage): Response
    {
        $ticket = new Ticket();
        $entityManager = $this->getDoctrine()->getManager();
        //$voyage = $entityManager->find(Voyage::class, $request->get('voyage'));
        $ticket->setVoyage($voyage);

        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($ticket);
                $entityManager->flush();
                $this->addFlash('success', 'Insertion success');
                return $this->redirectToRoute('voyage_show',['id'=> $voyage]);
            } catch (\Exception $e) {
                $this->addFlash('errors', 'Une erreur est survenu lors de l\'Insertion');
            }
        }

        return $this->render('ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
            'button_label' => 'Ajouter'
        ]);
    }

    /**
     * @Route("/{id}", name="ticket_show", methods={"GET"})
     */
    public function show(Ticket $ticket): Response
    {
        return $this->render('ticket/show.html.twig', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ticket_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ticket $ticket): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Mise à jour success');
                return $this->redirectToRoute('voyage_show',['id'=> $ticket->getVoyage()]);
            } catch (\Exception $e) {
                $this->addFlash('errors', 'Une erreur est survenu lors de la mise à jour');
            }
        }

        return $this->render('ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
            'button_label' => 'Modifier'
        ]);
    }

    /**
     * @Route("/{id}", name="ticket_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ticket $ticket): Response
    {
        $voyage= $ticket->getVoyage();
        if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token'))) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($ticket);
                $entityManager->flush();
                $this->addFlash('success', 'Suppression success');
            } catch (\Exception $e) {
                $this->addFlash('errors', 'Une erreur est survenu lors de la suppression');
            }

        }
        return $this->redirectToRoute('voyage_show',['id'=> $voyage]);
    }
}
