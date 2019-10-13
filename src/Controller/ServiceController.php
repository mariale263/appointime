<?php

namespace App\Controller;
use App\Entity\Service;
use App\Form\ServiceType;
use App\Manager\ServiceManager;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service")
 */
class ServiceController extends AbstractController
{

    /**
    * @param ServiceManager $serviceManager
    */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @Route("/", name="service_index", methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'servicies' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(!$this->serviceManager->new($service)) {
                $this->addFlash(
                    'error',
                    'Error al guardar nuevo servicio'
                );
            } else {
                $this->addFlash(
                    'success',
                    'Se ha guardado nuevo servicio'
                );

                return $this->redirectToRoute('service_index');
            }
        }

        return $this->render('service/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_show", methods={"GET"})
     */
    public function show(Service $service): Response
    {
        return $this->render('service/show.html.twig', [
            'service' => $service,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Service $service): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if(!$this->serviceManager->update($service)) {
                $this->addFlash(
                    'error',
                    'Error al editar nuevo servicio'
                );
            } else {
                $this->addFlash(
                    'success',
                    'Se ha actualizado nuevo servicio'
                );

                return $this->redirectToRoute('service_index');
            }
           
        }

        return $this->render('service/edit.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="service_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Service $service): Response
    {
        if(!$this->serviceManager->delete($service)) {
            $this->addFlash(
                'error',
                'Error al eliminar servicio'
            );
        } else {
            $this->addFlash(
                'success',
                'Se ha eliminado el servicio'
            );
        }
        return $this->redirectToRoute('service_index');
    }
}
