<?php

namespace App\Controller\Admin;

use App\Entity\Diy;
use App\Entity\DiySearch;
use App\Form\DiySearchType;
use App\Form\DiyType;
use App\Repository\DiyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/diy")
 */
class AdminDiyController extends AbstractController
{


    /**
     * @var DiyRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(DiyRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="admin.diy.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $search = new DiySearch();
        $form = $this->createForm(DiySearchType::class, $search);
        $form->handleRequest($request);


        $diys = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('admin/diy/index.html.twig', [
            'current_menu' => 'gestion-diy',
            'diys' => $diys,
            'form' => $form->createView()
        ]);

        /*$diys = $this->repository->findAll();
        return $this->render('admin/diy/index.html.twig', compact('diys'));
*/
    }

    /**
     * @Route("/create", name="admin.diy.new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $diy = new Diy();
        $form = $this->createForm(DiyType::class, $diy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($diy);
            $this->em->flush();
            $this->addFlash('success', 'Bien crée avec succès');
            return $this->redirectToRoute('admin.diy.index');

        }
        return $this->render('admin/diy/new.html.twig', [
            'diy' => $diy,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="admin.diy.edit", methods="GET|POST")
     * @param Diy $product
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Diy $diy, Request $request)
    {

        $form = $this->createForm(DiyType::class, $diy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin.diy.index');
        }
        return $this->render('admin/diy/edit.html.twig', [
            'diy' => $diy,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/{id}", name="admin.diy.delete", methods="DELETE")
     * @param Diy $property
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Diy $diy, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $diy->getId(), $request->get('_token'))) {
            $this->em->remove($diy);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');

        }

        return $this->redirectToRoute('admin.diy.index');
    }

}