<?php

namespace App\Controller;

use App\Entity\Servicio;
use App\Form\ServicioType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicioController extends AbstractController
{
    #[Route('/', name: 'app_servicio_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $servicios = $em->getRepository(Servicio::class)->findAll();

        return $this->render('servicio/index.html.twig', [
            'servicios' => $servicios,
        ]);
    }

    #[Route('/servicio/nuevo', name: 'app_servicio_nuevo')]
    public function nuevo(Request $request, EntityManagerInterface $em): Response
    {
        $servicio = new Servicio();
        $form = $this->createForm(ServicioType::class, $servicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($servicio);
            $em->flush();

            $this->addFlash('success', 'Servicio agregado correctamente.');

            return $this->redirectToRoute('app_servicio_index');
        }

        return $this->render('servicio/nuevo.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/servicio/editar/{id}', name: 'app_servicio_editar')]
    public function editar(Request $request, Servicio $servicio, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ServicioType::class, $servicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Servicio actualizado correctamente.');

            return $this->redirectToRoute('app_servicio_index');
        }

        return $this->render('servicio/editar.html.twig', [
            'form' => $form->createView(),
            'servicio' => $servicio,
        ]);
    }

    #[Route('/servicio/eliminar/{id}', name: 'app_servicio_eliminar', methods: ['POST'])]
    public function eliminar(Request $request, Servicio $servicio, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('eliminar' . $servicio->getId(), $request->request->get('_token'))) {
            $em->remove($servicio);
            $em->flush();

            $this->addFlash('success', 'Servicio eliminado correctamente.');
        }

        return $this->redirectToRoute('app_servicio_index');
    }
}
