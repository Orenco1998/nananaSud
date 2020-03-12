<?php

namespace App\Controller\Admin;

use App\Entity\ServiceSearch;
use App\Entity\Service;
use App\Form\ServiceSearchType;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/service")
 */
class AdminServiceController extends AbstractController
{


    /**
     * @var ServiceRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ServiceRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="admin.service.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $search = new ServiceSearch();
        $form = $this->createForm(ServiceSearchType::class, $search);
        $form->handleRequest($request);


        $services = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('admin/service/index.html.twig', [
            'current_menu' => 'gestion-service',
            'services' => $services,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/create", name="admin.service.new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($service);
            $this->em->flush();
            $this->addFlash('success', 'Bien crée avec succès');
            return $this->redirectToRoute('admin.product.index');

        }
        return $this->render('admin/service/new.html.twig', [
            'service' => $service,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="admin.service.edit", methods="GET|POST")
     * @param Service $product
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Service $service, Request $request)
    {

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin.service.index');
        }
        return $this->render('admin/service/edit.html.twig', [
            'service' => $service,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/{id}", name="admin.service.delete", methods="DELETE")
     * @param Service $property
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Service $service, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $service->getId(), $request->get('_token'))) {
            $this->em->remove($service);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');

        }

        return $this->redirectToRoute('admin.service.index');
    }

}