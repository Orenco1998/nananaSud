<?php


namespace App\Controller\Particular;


use App\Entity\Diy;
use App\Entity\DiySearch;
use App\Form\DiySearchType;
use App\Repository\DiyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiyController extends AbstractController
{
    /**
     * @var DiyRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(DiyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/diy", name="diy.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new DiySearch();
        $form = $this->createForm(DiySearchType::class, $search);
        $form->handleRequest($request);


        $diys = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('diy/index.html.twig', [
            'current_menu' => 'diy',
            'diys' => $diys,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/diy/{slug}-{id}", name="diy.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Diy $diy, string $slug, Request $request): Response
    {

        if ($diy->getSlug() !== $slug) {
            return $this->redirectToRoute('diy.show', [
                'id' => $diy->getId(),
                'slug' => $diy->getSlug()
            ], 301);
        }



        return $this->render('diy/show.html.twig', [
            'diy' => $diy,
            'current_menu' => 'diy'
        ]);
    }
}