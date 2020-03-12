<?php


namespace App\Controller\Compagny;


use App\Entity\Service;
use App\Entity\ServiceSearch;
use App\Form\ServiceSearchType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    /**
     * @var ServiceRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ServiceRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/service", name="service.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new ServiceSearch();
        $form = $this->createForm(ServiceSearchType::class, $search);
        $form->handleRequest($request);


        $services = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('service/index.html.twig', [
            'current_menu' => 'service',
            'services' => $services,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/service/{slug}-{id}", name="service.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Service $service, string $slug, Request $request): Response
    {

        if ($service->getSlug() !== $slug) {
            return $this->redirectToRoute('service.show', [
                'id' => $service->getId(),
                'slug' => $service->getSlug()
            ], 301);
        }

        return $this->render('service/show.html.twig', [
            'service' => $service,
            'current_menu' => 'service'
        ]);
    }
}