<?php


namespace App\Controller;


use App\Entity\Basket;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class BasketController extends AbstractController
{

    /**
     * @Route("/basket", name="basket.index")
     */
    public function index(){
        //$products = $this->repository->findAll();
        return $this->render('basket/index.html.twig');
    }

    /**
     * @Route("/basket/add/{id}", name="basket_add")
     */
    public function add($id, Request $request){

        $session = $request->getSession();
        $panier = $session->get('panier', []);

        $panier[$id] = 1;

        $session->set('panier', $panier);

        dd($session->get('panier'));
    }
}