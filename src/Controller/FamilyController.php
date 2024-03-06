<?php

namespace App\Controller;

use App\Entity\Family;
use App\Form\FamilyType;
use App\Repository\FamilyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;




#[Route('/family')]
class FamilyController extends AbstractController
{
    #[Route('/', name: 'app_family_index', methods: ['GET','POST'])]
    public function index(FamilyRepository $familyRepository): Response
    {
        return $this->render('family/index.html.twig', [
            'families' => $familyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_family_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,LoggerInterface $logger): Response
    {
        $family = new Family();
        $form = $this->createForm(FamilyType::class, $family);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($family);
            $entityManager->flush();

       ;

            return $this->redirectToRoute('app_family_index');
            
        }

        return $this->render('family/new.html.twig', [
            'family' => $family,
            
            'form' => $form->createView(), // Pass form view instead of form itself
        ]);
    }

    #[Route('/{id}', name: 'app_family_show', methods: ['GET'])]
    public function show(Family $family): Response
    {
        return $this->render('family/show.html.twig', [
            'family' => $family,
        ]);
    }
    #[Route('/{id}/edit', name: 'app_family_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Family $family, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FamilyType::class, $family);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Redirect to the page displaying the edited family
            return $this->redirectToRoute('app_family_show', ['id' => $family->getId()]);
        }

        return $this->render('family/edit.html.twig', [
            'family' => $family,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/family/{id}', name: 'app_family_delete', methods: ['POST'])]
    public function delete(Request $request, Family $family, EntityManagerInterface $entityManager): Response
    {
        // Check if the request is a valid DELETE request
        if (!$this->isCsrfTokenValid('delete'.$family->getId(), $request->request->get('_token'))) {
            // If CSRF token is not valid, return a 403 Forbidden response
            return new Response('Invalid CSRF Token', Response::HTTP_FORBIDDEN);
        }

        // Remove the family entity
        $entityManager->remove($family);
        $entityManager->flush();

        // Redirect to the index page after successful deletion
        return $this->redirectToRoute('app_family_index', [], Response::HTTP_SEE_OTHER);
    }
}
