<?php

namespace App\Controller;

use App\Entity\Subsidiary;
use App\Form\SubsidiaryType;
use App\Repository\SubsidiaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/subsidiary")
 */
class SubsidiaryController extends AbstractController
{
    /**
     * @Route("/", name="subsidiary_index", methods={"GET"})
     */
    public function index(SubsidiaryRepository $subsidiaryRepository): Response
    {
        return $this->render('subsidiary/index.html.twig', [
            'subsidiaries' => $subsidiaryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="subsidiary_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subsidiary = new Subsidiary();
        $form = $this->createForm(SubsidiaryType::class, $subsidiary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subsidiary);
            $entityManager->flush();

            return $this->redirectToRoute('subsidiary_index');
        }

        return $this->render('subsidiary/new.html.twig', [
            'subsidiary' => $subsidiary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subsidiary_show", methods={"GET"})
     */
    public function show(Subsidiary $subsidiary): Response
    {
        return $this->render('subsidiary/show.html.twig', [
            'subsidiary' => $subsidiary,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="subsidiary_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Subsidiary $subsidiary): Response
    {
        $form = $this->createForm(SubsidiaryType::class, $subsidiary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subsidiary_index');
        }

        return $this->render('subsidiary/edit.html.twig', [
            'subsidiary' => $subsidiary,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="subsidiary_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Subsidiary $subsidiary): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subsidiary->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subsidiary);
            $entityManager->flush();
        }

        return $this->redirectToRoute('subsidiary_index');
    }
}
