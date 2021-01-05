<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/create", name="app_create")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $publication=new Publication;
        $form=$this->createForm(PublicationType::class,$publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em->persist($publication);
            $em->flush();

            $this->addFlash('success','pub créé avec succès !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('admin/create.html.twig',[
            'publication'=>$publication,
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/show", name="app_show")
     */
    public function show()
    {
        return $this->render('admin/show.html.twig');

    }    
}
