<?php

namespace App\Controller;

use App\Entity\Reeser;
use App\Form\ReeserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reeser')]
class ReeserController extends AbstractController
{
    #[Route('/', name: 'app_reeser_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $reesers = $entityManager
            ->getRepository(Reeser::class)
            ->findAll();

        return $this->render('Back/reeser/index.html.twig', [
            'reesers' => $reesers,
        ]);
    }

    #[Route('/new', name: 'app_reeser_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reeser = new Reeser();
        $form = $this->createForm(ReeserType::class, $reeser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reeser);
            $entityManager->flush();

            return $this->redirectToRoute('app_reeser_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Back/reeser/new.html.twig', [
            'reeser' => $reeser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reeser_show', methods: ['GET'])]
    public function show(Reeser $reeser): Response
    {
        return $this->render('Back/reeser/show.html.twig', [
            'reeser' => $reeser,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reeser_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reeser $reeser, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReeserType::class, $reeser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reeser_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Back/reeser/edit.html.twig', [
            'reeser' => $reeser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reeser_delete', methods: ['POST'])]
    public function delete(Request $request, Reeser $reeser, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reeser->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reeser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reeser_index', [], Response::HTTP_SEE_OTHER);
    }
}
