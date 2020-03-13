<?php


namespace App\Controller\Particular;


use App\Entity\Basket;
use App\Entity\Product;
use App\Entity\ProductSearch;
use App\Form\BasketType;
use App\Form\ProductSearchType;
use App\Form\ServiceSearchType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ProductRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/product", name="product.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {

        $search = new ProductSearch();
        $form = $this->createForm(ProductSearchType::class, $search);
        $form->handleRequest($request);


        $products = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('product/index.html.twig', [
            'current_menu' => 'product',
            'products' => $products,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/product/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Product $product, string $slug, Request $request, UserInterface $user): Response
    {
        $basket = new Basket();
        $basket->setIdProduct($product)
                ->setUserId($user);
        $form = $this->createForm(BasketType::class, $basket);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($basket);
            $this->em->flush();
            $this->addFlash('success', 'Produit bien ajouté au panier');
            return $this->redirectToRoute('basket.index', [
                'id' => $product->getId(),
                'basket'=> $basket,
                'slug' => $product->getSlug()
            ]);
        }
        if ($product->getSlug() == $slug) {
            return $this->render('product/show.html.twig', [
                'id' => $product->getId(),
                'slug' => $product->getSlug(),
                'product' => $product,
                'basket' => $basket,
                'form' => $form->createView()
            ]);
        }



    }
}