<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Form\EditUserType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AdminUserController extends AbstractController
{
   /* /**
     * @Route("/", name="index")
     */
   /* public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminUserController',
        ]);
    }*/

    /**
     * Liste des utilisateurs du site
     * @Route("/admin", name="admin.user.index")
     */
    public function index(UsersRepository $users){

        return $this->render("admin/user/index.html.twig",[
            'users' => $users->findAll()
            ]);
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
}
