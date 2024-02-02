<?php

namespace App\Controller;

use App\Entity\Donate;
use App\Form\DonateType;
use App\Repository\DonateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/donate')]
class DonateController extends AbstractController
{
    #[Route('/', name: 'app_donate_index', methods: ['GET'])]
    public function index(DonateRepository $donateRepository): Response
    {
        return $this->render('donate/index.html.twig', [
            'donates' => $donateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_donate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $donate = new Donate();
        $form = $this->createForm(DonateType::class, $donate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($donate);
            $entityManager->flush();

            return $this->redirectToRoute('app_donate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('donate/new.html.twig', [
            'donate' => $donate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donate_show', methods: ['GET'])]
    public function show(Donate $donate): Response
    {
        return $this->render('donate/show.html.twig', [
            'donate' => $donate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_donate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Donate $donate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DonateType::class, $donate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_donate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('donate/edit.html.twig', [
            'donate' => $donate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donate_delete', methods: ['POST'])]
    public function delete(Request $request, Donate $donate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$donate->getId(), $request->request->get('_token'))) {
            $entityManager->remove($donate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_donate_index', [], Response::HTTP_SEE_OTHER);
    }
}
