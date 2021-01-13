<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Entity\Publication;
use App\Form\PublicationType;
use App\Repository\PublicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');}

    /**
     * @Route("/admin/create", name="app_create")
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
     * @Route("/actionadmin/", name="app_action")
     */
    public function action(PublicationRepository $publicationRepository): Response
    {
        $publications=$publicationRepository->findAll();
        return $this->render('admin/action.html.twig', compact('publications'));
    }

    /**
     * @Route("/admin/show/{id<[0-9]+>}", name="app_show")
     */
    public function show(Request $request, Publication $publication): Response
    {
        // $contact=new ContactUs();
        // $formc=$this->createForm(ContactUs::class,$contact);
        // $formc->handleRequest($request);

        return $this->render('admin/show.html.twig',compact('publication')
            // ['formc'=>$formc->createView()]

    );

    }

    /**
     * @Route("/admin/{id<[0-9]+>}/edit", name="app_edit",methods={"GET","POST"})
     */
    public function edit(Request $request, EntityManagerInterface $em, Publication $publication): Response
    {
        $form=$this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $em->flush();
            $this->addFlash('success','Publication modifié avec succès !');
            return $this->redirectToRoute('app_home');
        }
        return $this->render('admin/edit.html.twig',[
            'publication'=>$publication,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/admin/{id<[0-9]+>}/delete", name="app_delete", methods={"GET"})
     */
    public function delete(Request $request, EntityManagerInterface $em, Publication $publication): Response
    {
        if ($this->isCsrfTokenValid('publication_deletion_'.$publication->getId(),$request->request->get('csrf_token')))
        {
            $em->remove($publication);
            $em->flush();
            $this->addFlash('info','publication supprimée avec succes ...');
        }
        return $this->redirectToRoute('app_home');

    }
}
