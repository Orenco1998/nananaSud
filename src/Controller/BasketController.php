<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;

class BasketController
{

    /**
     * @Route("/basket", name="basket.index")
     */
    public function index(){
        return $this->render('basket/index.html.twig', []);
    }

    /**
     * @Route("/basket/add/{id}", name="basket_add")
     */
    public function add($id){


    }
}