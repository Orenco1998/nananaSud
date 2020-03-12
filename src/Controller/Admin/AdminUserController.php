<?php

namespace App\Controller\Admin;

use App\Entity\Diy;
use App\Entity\UserSearch;
use App\Entity\Users;
use App\Form\EditUserType;
use App\Form\EditUserSearchType;
use App\Repository\ProductRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AdminUserController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(UsersRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * Liste des utilisateurs du site
     * @Route("/admin", name="admin.user.index")
     */
    public function index(PaginatorInterface $paginator, Request $request){

        $search = new UserSearch();
        $form = $this->createForm(EditUserSearchType::class, $search);
        $form->handleRequest($request);


        $users = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1), 12
        );
        return $this->render('admin/user/index.html.twig', [
            'current_menu' => 'user',
            'users' => $users,
            'form' => $form->createView()
        ]);

       /* return $this->render("admin/user/index.html.twig",[
            'users' => $users->findAll()
            ]);*/
    }

    /**
     * Modifier un utilisateur
     *
     * @Route("/modifier/({id}", name="admin.user.edit_user")
     */
    public function editUser(Users $user, Request $request){

        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin.user.index');

        }
        return $this->render('admin/user/edit.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="admin.user.delete", methods="DELETE")
     * @param Users $property
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Users $user, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token'))) {
            $this->em->remove($user);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');

        }

        return $this->redirectToRoute('admin.user.index');
    }

}
