<?php


namespace App\Controller;


use App\Entity\Basket;
use App\Repository\BasketRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class BasketController extends AbstractController
{

    /**
     * @var BasketRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(BasketRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/basket", name="basket.index")
     */
    public function index(BasketRepository $basketRepository){
        $users = $this->getUser()->getId();
        return $this->render('basket/index.html.twig', [
            'basket' => $basketRepository->findAll(),
        ]);
    }
}